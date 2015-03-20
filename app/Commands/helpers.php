<?php
if (! function_exists('uniqueid')) {

    /**
     * 创建一个分布式唯一ID
     *
     * @return string
     */
    function uniqueid()
    {
        $uniqid = uniqid(gethostname(), true);
        $md5 = substr(md5($uniqid), 12, 8); // 8位md5
        $uint = hexdec($md5);
        return sprintf('%s%010u', date('Ymd'), $uint);
    }
}

if (! function_exists('filepull')) {

    /**
     * 图片ID转换为图片地址
     *
     * @return string
     */
    function filepull($id)
    {
        $file = UserFile::find($id);
        return 'http://img.517yq.com/' . $file->storage->path;
    }
}

if (! function_exists('db_transaction')) {

    /**
     * 分布式事务临时解决方案
     *
     * @param Closure $callback
     * @return boolean
     */
    function db_transaction(Closure $callback)
    {
        DB::transaction(function ($global) use($callback)
        {
            return $callback($global);
        });
    }
}

if (! function_exists('db_begin_transaction')) {

    /**
     * 开启分布式事务
     */
    function db_begin_transaction()
    {
        DB::beginTransaction();
    }
}

if (! function_exists('db_rollback')) {

    /**
     * 回滚分布式事务
     */
    function db_rollback()
    {
        DB::rollBack();
    }
}

if (! function_exists('db_commit')) {

    /**
     * 提交分布式事务
     */
    function db_commit()
    {
        DB::commit();
    }
}

if (! function_exists('calculate_brokerage')) {

    /**
     * 根据订单商品信息统计佣金金额
     */
    function calculate_brokerage($orderGoodsInfo)
    {
        if (!is_null($orderGoodsInfo->refund) && $orderGoodsInfo->refund->status == Refund::STATUS_WAIT_ENTERPRISE_REPAYMENT) {
            return round($orderGoodsInfo->price * $orderGoodsInfo->quantity * ($orderGoodsInfo->brokerage_ratio + $orderGoodsInfo->level_brokerage_ratio) / 100, 2);
        }
        return 0;
    }
}

if (! function_exists('round_custom')) {

    /**
     * 自定义的四舍五入
     */
    function round_custom($number, $decimal = 2)
    {
        return sprintf("%.{$decimal}f", round($number, 2));
    }
}

if (! function_exists('id_pad')) {

    /**
     * 指定长度的左边补零
     */
    function id_pad($id, $len = 6)
    {
        return str_pad($id, $len, '0', STR_PAD_LEFT);
    }
}

if (! function_exists('select_enterprise')) {

    /**
     * 选择当前所属企业
     */
    function select_enterprise()
    {
        $host = array_get(parse_url(URL::current()), 'host');
        return strtolower(current(explode('.', $host)));
    }
}

if (! function_exists('enterprise_info')) {

    /**
     * 获取当前的企业信息
     */
    function enterprise_info()
    {
        $enterprise = select_enterprise();
        // 获取企业信息
        return Cache::remember("enterprise_{$enterprise}_info", 10, function () use($enterprise)
        {
            // 获取二级域名对应的企业
            $enterprise = Enterprise::where('domain', $enterprise)->first();
            // 获得企业为空，有可能是m版访问，模型中有加入where enterprise_id = ** 。所以得加如下判断，否则m版调用member模型报错
            if (is_null($enterprise)) {
                // 为了不报错，返回第一条数据
                return Enterprise::first();
            } else {
                return $enterprise;
            }
        });
    }
}

if (! function_exists('get_allowed_buy_num')) {

    /**
     * 获取可购买活动的商品数量
     */
    function get_allowed_buy_num($goods_info, $user = null, $buy = 0)
    {
        if ($goods_info->activity) {
            $quota = ActivitiesGoods::where('activity_id', $goods_info->activity['activity']->id)->where('goods_id', $goods_info->id)->pluck('quota');
            if (! empty($user)) {
                // 获取用户已购买此活动的商品总数
                $number = OrderGoods::where('goods_id', $goods_info->id)->where('activity_id', $goods_info->activity['activity']->id)
                    ->whereHas('order', function ($q) use($user)
                {
                    $q->where('member_id', $user->id)
                        ->where('status', '<>', Order::STATUS_CANCEL);
                })
                    ->sum('quantity');
                $quota -= $number + $buy;
            }
            $quota < 0 && $quota = 0;
            return $quota;
        }
        return $goods_info->stock;
    }
}

if (! function_exists('system_parameter')) {

    /**
     * 获取系统参数，优先查询企业系统参数表,未设置再查找系统参数表
     */
    function system_parameter($key, $enterprise = null, $default = 0)
    {
        empty($enterprise) && $enterprise = enterprise_info();

        $enterprise_system_parameter = EnterpriseSystemParameters::whereEnterpriseId($enterprise->id)->whereKey($key)->first();

        if (! is_null($enterprise_system_parameter)) {
            // 企业系统参数表
            return $enterprise_system_parameter->keyvalue;
        } else {
            // 系统参数表
            $system_parameter = SystemParameters::whereKey($key)->first();
            if (! is_null($system_parameter)) {
                return $system_parameter->keyvalue;
            }
        }
        return $default;
    }
}

if (! function_exists('anonymous_mobile')) {

    /**
     * 隐藏手机号码中间4位数字
     */
    function anonymous_mobile($mobile, $replace_str = '****')
    {
        $mobile = str_split($mobile, 1);
        return $mobile[0] . $mobile[1] . $mobile[2] . $replace_str . $mobile[7] . $mobile[8] . $mobile[9] . $mobile[10];
    }
}

if (! function_exists('avatar_pic')) {

    /**
     * 用户用户头像
     */
    function avatar_pic($data)
    {
        $url = $data->avatar->url;
        if (empty($url)) {
            $url = asset('images/no_avatar.jpg');
        }
        return $url;
    }
}

if (! function_exists('foot_mark')) {

    /**
     * 足迹记录
     */
    function foot_mark($model = null)
    {
        if (Auth::check()) {
            if (! empty($model)) {
                // 查询是否已记录
                if (Footmark::where('member_id', Auth::user()->id)->where('taggable_id', $model->id)
                    ->where('taggable_type', get_class($model))
                    ->count() < 1) {
                    $footmark = new Footmark();
                    $footmark->member()->associate(Auth::user());
                    $footmark->taggable()->associate($model);
                    $footmark->save();
                }
            }
            // 导入cookie中的记录
            $cookie_items = Cookie::get('foot_mark_items');
            if (! empty($cookie_items) && array_key_exists('Vstore', $cookie_items)) {
                foreach ($cookie_items['Vstore'] as $item) {
                    // 查询是否已记录
                    if (Footmark::where('member_id', Auth::user()->id)->where('taggable_id', $item)
                        ->where('taggable_type', 'Vstore')
                        ->count() < 1) {
                        $footmark = new Footmark();
                        $footmark->member()->associate(Auth::user());
                        $footmark->taggable_id = $item;
                        $footmark->taggable_type = 'Vstore';
                        $footmark->save();
                    }
                }
            }
        } else {
            // 记录到cookie中
            $value = Cookie::get('foot_mark_items');
            if (! empty($value) && array_key_exists(get_class($model), $value)) {
                if (! in_array($model->id, $value[get_class($model)])) {
                    $value[get_class($model)][] = $model->id;
                }
            } else {
                $value[get_class($model)][] = $model->id;
            }
            Cookie::queue('foot_mark_items', $value);
        }
    }
}

if (! function_exists('visit_stats')) {

    /**
     * 足迹记录
     */
    function visit_stats($enterprise_id = 0)
    {
        if ($enterprise_id == 0) {
            return;
        }
        // 获得浏览器名称和版本
        if (empty($_SERVER['HTTP_USER_AGENT'])) {
            $browser = '';
        } else {
            $agent = $_SERVER['HTTP_USER_AGENT'];
            $browser = '';
            $browser_ver = '';

            if (preg_match('/MSIE\s([^\s|;]+)/i', $agent, $regs)) {
                $browser = 'Internet Explorer';
                $browser_ver = $regs[1];
            } elseif (preg_match('/FireFox\/([^\s]+)/i', $agent, $regs)) {
                $browser = 'FireFox';
                $browser_ver = $regs[1];
            } elseif (preg_match('/Maxthon/i', $agent, $regs)) {
                $browser = '(Internet Explorer ' . $browser_ver . ') Maxthon';
                $browser_ver = '';
            } elseif (preg_match('/Opera[\s|\/]([^\s]+)/i', $agent, $regs)) {
                $browser = 'Opera';
                $browser_ver = $regs[1];
            } elseif (preg_match('/OmniWeb\/(v*)([^\s|;]+)/i', $agent, $regs)) {
                $browser = 'OmniWeb';
                $browser_ver = $regs[2];
            } elseif (preg_match('/Netscape([\d]*)\/([^\s]+)/i', $agent, $regs)) {
                $browser = 'Netscape';
                $browser_ver = $regs[2];
            } elseif (preg_match('/safari\/([^\s]+)/i', $agent, $regs)) {
                $browser = 'Safari';
                $browser_ver = $regs[1];
            } elseif (preg_match('/NetCaptor\s([^\s|;]+)/i', $agent, $regs)) {
                $browser = '(Internet Explorer ' . $browser_ver . ') NetCaptor';
                $browser_ver = $regs[1];
            } elseif (preg_match('/Lynx\/([^\s]+)/i', $agent, $regs)) {
                $browser = 'Lynx';
                $browser_ver = $regs[1];
            }

            if (! empty($browser)) {
                $browser = addslashes($browser . ' ' . $browser_ver);
            } else {
                $browser = 'Unknow browser';
            }
        }

        // 获得客户端的操作系统
        if (empty($_SERVER['HTTP_USER_AGENT'])) {
            $os = 'Unknown';
        } else {
            $agent = strtolower($_SERVER['HTTP_USER_AGENT']);
            $os = '';

            if (strpos($agent, 'win') !== false) {
                if (strpos($agent, 'nt 5.1') !== false) {
                    $os = 'Windows XP';
                } elseif (strpos($agent, 'nt 5.2') !== false) {
                    $os = 'Windows 2003';
                } elseif (strpos($agent, 'nt 5.0') !== false) {
                    $os = 'Windows 2000';
                } elseif (strpos($agent, 'nt 6.0') !== false) {
                    $os = 'Windows Vista';
                } elseif (strpos($agent, 'nt') !== false) {
                    $os = 'Windows NT';
                } elseif (strpos($agent, 'win 9x') !== false && strpos($agent, '4.90') !== false) {
                    $os = 'Windows ME';
                } elseif (strpos($agent, '98') !== false) {
                    $os = 'Windows 98';
                } elseif (strpos($agent, '95') !== false) {
                    $os = 'Windows 95';
                } elseif (strpos($agent, '32') !== false) {
                    $os = 'Windows 32';
                } elseif (strpos($agent, 'ce') !== false) {
                    $os = 'Windows CE';
                }
            } elseif (strpos($agent, 'linux') !== false) {
                $os = 'Linux';
            } elseif (strpos($agent, 'unix') !== false) {
                $os = 'Unix';
            } elseif (strpos($agent, 'sun') !== false && strpos($agent, 'os') !== false) {
                $os = 'SunOS';
            } elseif (strpos($agent, 'ibm') !== false && strpos($agent, 'os') !== false) {
                $os = 'IBM OS/2';
            } elseif (strpos($agent, 'mac') !== false && strpos($agent, 'pc') !== false) {
                $os = 'Macintosh';
            } elseif (strpos($agent, 'powerpc') !== false) {
                $os = 'PowerPC';
            } elseif (strpos($agent, 'aix') !== false) {
                $os = 'AIX';
            } elseif (strpos($agent, 'hpux') !== false) {
                $os = 'HPUX';
            } elseif (strpos($agent, 'netbsd') !== false) {
                $os = 'NetBSD';
            } elseif (strpos($agent, 'bsd') !== false) {
                $os = 'BSD';
            } elseif (strpos($agent, 'osf1') !== false) {
                $os = 'OSF1';
            } elseif (strpos($agent, 'irix') !== false) {
                $os = 'IRIX';
            } elseif (strpos($agent, 'freebsd') !== false) {
                $os = 'FreeBSD';
            } elseif (strpos($agent, 'teleport') !== false) {
                $os = 'teleport';
            } elseif (strpos($agent, 'flashget') !== false) {
                $os = 'flashget';
            } elseif (strpos($agent, 'webzip') !== false) {
                $os = 'webzip';
            } elseif (strpos($agent, 'offline') !== false) {
                $os = 'offline';
            } else {
                $os = 'Unknown';
            }
        }

        // 获得用户的真实IP地址
        static $realip = NULL;

        if ($realip === NULL) {
            if (isset($_SERVER)) {
                if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                    $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
                    /* 取X-Forwarded-For中第一个非unknown的有效IP字符串 */
                    foreach ($arr as $ip) {
                        $ip = trim($ip);

                        if ($ip != 'unknown') {
                            $realip = $ip;

                            break;
                        }
                    }
                } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
                    $realip = $_SERVER['HTTP_CLIENT_IP'];
                } else {
                    if (isset($_SERVER['REMOTE_ADDR'])) {
                        $realip = $_SERVER['REMOTE_ADDR'];
                    } else {
                        $realip = '0.0.0.0';
                    }
                }
            } else {
                if (getenv('HTTP_X_FORWARDED_FOR')) {
                    $realip = getenv('HTTP_X_FORWARDED_FOR');
                } elseif (getenv('HTTP_CLIENT_IP')) {
                    $realip = getenv('HTTP_CLIENT_IP');
                } else {
                    $realip = getenv('REMOTE_ADDR');
                }
            }

            preg_match("/[\d\.]{7,15}/", $realip, $onlineip);
            $realip = ! empty($onlineip[0]) ? $onlineip[0] : '0.0.0.0';
        }

        // 获取地理位置IP
        static $fp = NULL, $offset = array(), $index = NULL;

        $ip = gethostbyname($realip);
        $ipdot = explode('.', $ip);
        $ip = pack('N', ip2long($ip));

        $ipdot[0] = (int) $ipdot[0];
        $ipdot[1] = (int) $ipdot[1];
        if ($ipdot[0] == 10 || $ipdot[0] == 127 || ($ipdot[0] == 192 && $ipdot[1] == 168) || ($ipdot[0] == 172 && ($ipdot[1] >= 16 && $ipdot[1] <= 31))) {
            $area = 'LAN';
        } else {
            if ($fp === NULL) {
                $fp = fopen(app_path('config/ipdata.dat'), 'rb');
                if ($fp === false) {
                    $area = 'Invalid IP data file';
                } else {
                    $offset = unpack('Nlen', fread($fp, 4));
                    if ($offset['len'] < 4) {
                        $area = 'Invalid IP data file';
                    } else {
                        $index = fread($fp, $offset['len'] - 4);
                        $length = $offset['len'] - 1028;
                        $start = unpack('Vlen', $index[$ipdot[0] * 4] . $index[$ipdot[0] * 4 + 1] . $index[$ipdot[0] * 4 + 2] . $index[$ipdot[0] * 4 + 3]);
                        for ($start = $start['len'] * 8 + 1024; $start < $length; $start += 8) {
                            if ($index{$start} . $index{$start + 1} . $index{$start + 2} . $index{$start + 3} >= $ip) {
                                $index_offset = unpack('Vlen', $index{$start + 4} . $index{$start + 5} . $index{$start + 6} . "\x0");
                                $index_length = unpack('Clen', $index{$start + 7});
                                break;
                            }
                        }

                        fseek($fp, $offset['len'] + $index_offset['len'] - 1024);
                        $area = fread($fp, $index_length['len']);

                        fclose($fp);
                        $fp = NULL;
                    }
                }
            }
        }

        // 语言
        if (! empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
            $pos = strpos($_SERVER['HTTP_ACCEPT_LANGUAGE'], ';');
            $lang = addslashes(($pos !== false) ? substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, $pos) : $_SERVER['HTTP_ACCEPT_LANGUAGE']);
        } else {
            $lang = '';
        }

        // 来源
        if (! empty($_SERVER['HTTP_REFERER']) && strlen($_SERVER['HTTP_REFERER']) > 9) {
            $pos = strpos($_SERVER['HTTP_REFERER'], '/', 9);
            if ($pos !== false) {
                $domain = substr($_SERVER['HTTP_REFERER'], 0, $pos);
                $path = substr($_SERVER['HTTP_REFERER'], $pos);
            } else {
                $domain = $path = '';
            }
        } else {
            $domain = $path = '';
        }
        // 保存访客数据
        if (! empty($realip)) {// && ! empty($path)
            //$access_url = $_SERVER['HTTP_HOST'] . addslashes($_SERVER['PHP_SELF']);
            $access_url = $_SERVER['HTTP_HOST'] . Request::getRequestUri();
            $temp = Stats::whereAccessDate(date('Y-m-d'))->whereAccessUrl($access_url)
                ->whereBrowser($browser)
                ->whereSystem($os)
                ->whereLanguage($lang)
                ->whereArea($area)
                ->whereRefererDomain(addslashes($domain))
                ->whereRefererPath(addslashes($path))
                ->first();
            $stats = is_null($temp) ? new Stats() : $temp;
            $stats->enterprise_id = $enterprise_id;
            $stats->ip = $realip;
            $stats->visit_times = is_null($temp) ? 1 : $stats->visit_times + 1;
            $stats->browser = $browser;
            $stats->system = $os;
            $stats->language = $lang;
            $stats->area = $area;
            $stats->referer_domain = addslashes($domain);
            $stats->referer_path = addslashes($path);
            $stats->access_url = $access_url;
            $stats->access_date = date('Y-m-d');
            $stats->save();
        }
    }
}


if (! function_exists('getUserName')) {

    /**
     * 获取用户名
     */
    function getUserName($member_info)
    {
        if ($member_info->nickname) {
            return $member_info->nickname;
        } elseif ($member_info->username) {
            return $member_info->username;
        }
        return $member_info->mobile;
    }
}