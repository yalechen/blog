<?php
use Illuminate\Database\Seeder;
use App\Storage;
use App\UserFile;
use App\User;

class StorageTableSeeder extends Seeder
{

    public function run()
    {
        // 清空文件存储数据
        Storage::truncate();
        UserFile::truncate();

        // 在composer.json中载入autoload中添加此块目录，就无需include
        // include_once app_path('Commands/getID3/getid3.php');
        function getLevel($filename)
        {
            $system_files = [
                'fa24a612110135f42e8a3b1ec5db9239.png'
            ];
            $filename = basename($filename);
            $level = 0;
            foreach ($system_files as $item) {
                if ($item == $filename) {
                    break;
                }
                $level ++;
            }
            return $level;
        }

        $storage_path = realpath(base_path('storage/files')) . DIRECTORY_SEPARATOR;

        $max_user_id = User::orderBy('id', 'desc')->first()->id;

        $files = glob($storage_path . '*');
        usort($files, function ($a, $b)
        {
            $al = getLevel($a);
            $bl = getLevel($b);
            if ($al < $bl) {
                return - 1;
            }
            if ($al > $bl) {
                return 1;
            }
            return 0;
        });

        // 扫描目录下的文件放入数据库
        foreach ($files as $filename) {
            // 获取文件ID3信息。
            $info = with(new getID3())->analyze($filename);
            if (! isset($info['mime_type'])) {
                $info['mime_type'] = mime_content_type($filename);
            }

            // 记录文件数据。
            $storage = new Storage();
            $storage->hash = md5_file($filename);
            $storage->size = filesize($filename);
            $storage->width = isset($info['video']['resolution_x']) ? $info['video']['resolution_x'] : 0;
            $storage->height = isset($info['video']['resolution_y']) ? $info['video']['resolution_y'] : 0;
            $storage->mime = $info['mime_type'];
            $storage->seconds = isset($info['playtime_seconds']) ? $info['playtime_seconds'] : 0;
            $storage->format = $info['fileformat'] == 'jpg' ? 'jpeg' : $info['fileformat'];
            $storage->path = basename($filename);
            $storage->filename = sprintf('x%06dx', mt_rand(0, 999999));
            $storage->save();

            // 将文件分配给用户。
            $file = new UserFile();
            if ($storage->hash == 'fa24a612110135f42e8a3b1ec5db9239') {
                $file->user_id = 0;
            } else {
                $file->user()->associate(User::find(mt_rand(1, $max_user_id)));
            }
            // $file->storage()->associate($storage);
            $file->storage_hash = $storage->hash;
            $file->save();
        }
    }
}