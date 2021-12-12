<?php

  function hourlystats ($membername, $admem)
  {
    global $reranks;
    global $reranktime;
    global $wapdz;
    $hourly = array ();
    $membernames = array ();
    if ($membername)
    {
      $membernames[] = $membername;
    }
    else
    {
      $d = dir ('memberfiles');
      while ($entry = $d->read ())
      {
        if (strstr ($entry, '.dat'))
        {
          $membernames[] = str_replace ('.dat', '', $entry);
          continue;
        }
      }

      $d->close ();
    }

    $mem = 0;
    while ($mem < count ($membernames))
    {
      $memhourlylog = array ();
      read_explode ('memberfiles/' . $membernames[$mem] . '.csv', '
', $memhourlylog);
      $memberdatas = array ();
      read_explode ('memberfiles/' . $membernames[$mem] . '.dat', '|', $memberdatas);
      $i = 0;
      while ($i < 8)
      {
        $memhourly = array ();
        $memhourly[$i] = explode (';', $memhourlylog[$i]);
        $j = 0;
        while ($j < $reranks)
        {
          $hourly[$i][$j] += $memhourly[$i][$j];
          ++$j;
        }

        ++$i;
      }

      $hourly[0][$reranks] += $memberdatas[5];
      $hourly[1][$reranks] += $memberdatas[7];
      $hourly[2][$reranks] += $memberdatas[9];
      $hourly[3][$reranks] += $memberdatas[25];
      $hourly[4][$reranks] += $memberdatas[34];
      ++$mem;
    }

    if ($ff = @fopen ('datafiles/calctime.dat', 'r+'))
    {
      flock ($ff, 2);
      $calctime = array ();
      $calctime = explode ('|', fgets ($ff, 1024));
      flock ($ff, 3);
      fclose ($ff);
      $lastrerank = $calctime[2];
    }

    if (!$lastrerank)
    {
      $lastrerank = time ();
    }

    $maxhits = 0;
    $i = 0;
    while ($i <= $reranks)
    {
      $j = 0;
      while ($j <= 4)
      {
        if ($maxhits < $hourly[$j][$i])
        {
          $maxhits = $hourly[$j][$i];
        }

        ++$j;
      }

      ++$i;
    }


  }

  function remindmail ($mem, $pass, $wmmail)
  {
    global $sitename;
    global $email;
    global $scripts_path;
    $subject = 'Your Password for ' . $sitename . ' account ' . $mem;
    $Message = '' . 'You or anyone else have requested password for your account in ' . $sitename . '.

';
    $Message .= ('' . 'Edit account and View Stats: ' . $scripts_path . '/edit.php
Username: ' . $mem . '
Password: ' . $pass . '
');
    mail ($wmmail, $subject, $Message, mail_headers ($email));
  }

  function del_upper ($data)
  {
    $allowupper = 1;
    $i = 0;
    while ($i < strlen ($data))
    {
      $checked = $data[$i];
      if (!$allowupper)
      {
        $data[$i] = my_strtolower ($checked);
      }

      if ((my_strtoupper ($checked) == my_strtolower ($checked) OR $checked == my_strtolower ($checked)))
      {
        $allowupper = 1;
      }
      else
      {
        $allowupper = 0;
      }

      ++$i;
    }

    return $data;
  }

  function my_strtolower ($data)
  {
    if ($WAP)
    {
      return strtolower ($data);
    }

    return strtr ($data, 'ABCDEFGHIJKLMNOPQRSTUVWXYZÀÁÂÃÄÅ¨ÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÜÛÚÝÞ', 'abcdefghijklmnopqrstuvwxyzàáâãäå¸æçèéêëìíîïðñòóôõö÷øùüûúýþÿ');
  }

  function my_strtoupper ($data)
  {
    if ($WAP)
    {
      return strtoupper ($data);
    }

    return strtr ($data, 'abcdefghijklmnopqrstuvwxyzàáâãäå¸æçèéêëìíîïðñòóôõö÷øùüûúýþÿ', 'ABCDEFGHIJKLMNOPQRSTUVWXYZÀÁÂÃÄÅ¨ÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÜÛÚÝÞ');
  }

  function autosubmit_index ($val)
  {
    return strtolower (substr (md5 ($val), 5, 8));
  }

  function mail_headers ($from)
  {
    $headers = 'MIME-Version: 1.0' . '
';
    $headers .= 'Content-type: text/plain' . '
';
    $headers .= 'X-Priority: 3' . '
';
    $headers .= 'Return-Path: <' . $from . '>
';
    $headers .= 'From: ' . $from . '
';
    $headers .= 'Reply-To: ' . $from . '
';
    $headers .= 'X-Mailer: PHP/' . phpversion () . '
';
    return $headers;
  }

  function showtext ($text)
  {
    global $lng;
    global $wapdz;
    global $TXT;
    if ($wapdz)
    {
      return utf_encode ($TXT[$lng][$text]);
    }

    return $TXT[$lng][$text];
  }

  function grabpage ($url)
  {
    global $WAP;
    $parceurl = parse_url ($url);
    $urlpath = $parceurl['path'];
    if (!$urlpath)
    {
      $urlpath = '/';
    }

    if ($parceurl['query'])
    {
      $urlpath .= '?' . $parceurl['query'];
    }

    $pagehtml = '';
    $fp = fsockopen ($parceurl['host'], 80, $errno, $errstr, 30);
    if ($fp)
    {
      $out = 'GET ' . $urlpath . ' HTTP/1.1
';
      $out .= 'Accept: application/vnd.wap.wmlscriptc, text/vnd.wap.wml, application/vnd.wap.xhtml+xml, application/xhtml+xml, text/html, multipart/mixed, */*' . '
';
      $out .= 'Connection: Close' . '
';
      $out .= 'Host: ' . $parceurl['host'] . '
';
      if ($WAP)
      {
        $out .= 'User-Agent: Nokia5130c-2/2.0 (07.95) Profile/MIDP-2.1 Configuration/CLDC-1.1' . '

';
      }
      else
      {
        $out .= 'User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.2.8) Gecko/20100722 Firefox/3.6.8' . '

';
      }

      fwrite ($fp, $out);
      while (!feof ($fp))
      {
        stream_set_timeout ($fp, 2);
        $pagehtml .= fgets ($fp, 1024);
      }

      fclose ($fp);
      $pagehtml = trim (strstr ($pagehtml, '

'));
    }

    return $pagehtml;
  }

  $badsubmit = array ('<', '|', '"', '\'', '\\', '&', '#', 'eval');
  foreach ($_GET as $key => $value)
  {
    $newdata = str_replace ($badsubmit, array (), $value);
    $$key = strip_tags ($newdata);
  }

  foreach ($_POST as $key => $value)
  {
    $newdata = str_replace ($badsubmit, array (), $value);
    $$key = strip_tags ($newdata);
  }

  include 'config.php';
  include 'countries.php';
  $groupname = $grouptitle = array ();
  $groupname = explode (',', $CATEGORIES);
  $grouptitle = explode (',', $CAT_TITLES);
  if ((count ($grouptitle) < count ($groupname) OR !strlen ($CAT_TITLES)))
  {
    $grouptitle = $groupname;
  }

  if (($_GET['wap'] OR $_POST['wap']))
  {
    $wapdz = 1;
    $dz1 = $dz3 = '';
    $dz2 = '</tr><tr>';
    $dz4 = '</tr></table><br/><table cellspacing="0" width="100%"><tr>';
    $httpaccept = strtolower ($_SERVER['HTTP_ACCEPT']);
    if (strstr ($httpaccept, 'application/xhtml+xml'))
    {
      header ('Content-type: application/xhtml+xml');
    }
    else
    {
      header ('Content-type: application/vnd.wap.xhtml+xml');
    }

    header ('Cache-Control: no-cache');
    echo '<?xml version="1.0" encoding="UTF-8"?>';
    echo '<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
';
    readfile ('skin.php');
    include 'calculate.php';
    echo '<title>';
    echo $sitename;
    echo '</title>
</head>

<body>
<div>
<table cellspacing="0" width="100%">
<tr>
<td><a href=".">Home</a> -
';
    if ($sitetype == 1)
    {
      $stype = '';
    }
    else
    {
      $stype = '';
    }

    if ($paydomainok)
    {
      echo ' ' . $stype . ' ';
    }
    else
    {
      echo '<a href="http://wapranking.in">HOT ' . $stype . '</a>';
    }

    echo '</td>
</tr>
</table>
<br/>

';
  }
  else
  {
    $wapdz = 0;
    $dz2 = '';
    $dz1 = ' colspan="2"';
    $dz3 = ' align="center"';
    $dz4 = '<th></th>';
    if ((($noasubmit AND !count ($_POST)) AND (!count ($_GET) OR (count ($_GET) == 1 AND $_GET['cat']))))
    {
      setcookie (autosubmit_index ($_SERVER['SERVER_NAME']), autosubmit_index (substr (time (), 0, 0 - 3)), time () + 172800);
      header ('Cache-Control: no-cache');
    }

    echo '<html>
<head>
<title>';
    echo $sitename;
    echo '</title>
';
    readfile ('skin.php');
    include 'calculate.php';
    echo '<s';
    echo 'tyle type="text/css">
.rt{text-align:right}
</style>
</head>

<body>
<div align="center">
<table cellspacing="0" width="95%">
<tr>
<th width="200" align="left">
';
    if ($displaystats)
    {
      $filename = 'datafiles/daily.dat';
      if (file_exists ($filename))
      {
        $temp = '';
        if ($ff = @fopen ($filename, 'r'))
        {
          flock ($ff, 1);
          $temp = @fread ($ff, @filesize ($filename));
          flock ($ff, 3);
          fclose ($ff);
        }

        $daily = array ();
        $daily = explode ('
', $temp);
        $yesterdaystats = array ();
        $yesterdaystats = explode ('|', $daily[sizeof ($daily) - 2]);
        $totalein = $totaleout = 0;
        $i = 0;
        while ($i < sizeof ($daily) - 1)
        {
          $aa = array ();
          $aa = explode ('|', $daily[$i]);
          $totalein += $aa[1];
          $totaleout += $aa[2];
          ++$i;
        }

        echo '<b>' . $TXT[$lng]['Stats for current period'] . '<br/>' . $yesterdaystats[1] . ' ' . $TXT[$lng]['Visits'] . ' - ' . $yesterdaystats[2] . ' ' . $TXT[$lng]['Out'] . '</b>';
      }
    }

    echo '</th>
<td align="center">
<font size=4><a target="_blank" href=".">';
    echo $TXT[$lng]['Main page'];
    echo '</a> - GB ';
    if ($sitetype == 1)
    {
      echo 'Directory';
    }
    else
    {
      echo 'Top';
    }

    if ($paydomainok)
    {
      echo ' Top';
    }
    else
    {
      echo ' - <a target="_blank" href="http://top.wapranking.in">' . $TXT[$lng]['Download'] . '</a>';
    }

    echo '</font>
</td>
<th width="200" align="right">
';
    if ($displaystats)
    {
      echo '<b>' . $TXT[$lng]['Traffic Summary'] . '<br/>' . $totalein . ' ' . $TXT[$lng]['Visits'] . ' - ' . $totaleout . ' ' . $TXT[$lng]['Out'] . '</b>';
    }

    echo '</th></tr>
</table>
<br/>
';
  }

  if ($_POST['newaccount'])
  {
    $error = $domainerror = 0;
    if (($wapdz AND !$WAP))
    {
      $msg .= 'WAP submission is not allowed. ';
      $error = 1;
    }

    if (!$manualid)
    {
      $mem = '';
    }

    if (!$mem)
    {
      $url = parse_url (strtolower ($sendurl));
      $member = str_replace ('www.', '', $url['host']);
      $mem = str_replace ('.', '', $member);
      if ($memberdir)
      {
        $mem .= $memberdir;
        $member .= '/' . $memberdir;
      }
    }
    else
    {
      $member = $mem;
    }

    if ($mem)
    {
      if (40 < strlen ($mem))
      {
        $msg .= 'Domain or member name is too long. ';
        $error = 1;
      }
      else
      {
        if (preg_replace ('\'[^a-zA-Z0-9\\-]\'s', '', $mem) != $mem)
        {
          $msg .= 'Wrong domain or member name. ';
          $error = 1;
        }
        else
        {
          $surl = parse_url (strtolower ($scripts_path));
          $smember = str_replace ('www.', '', $surl['host']);
          $smem = str_replace ('.', '', $smember);
          if ((!$memberdir AND $mem == $smem))
          {
            $msg .= 'Wrong domain or member name. ';
            $error = 1;
          }
          else
          {
            $filename = 'memberfiles/' . $mem . '.dat';
            if (file_exists ($filename))
            {
              if ($manualid)
              {
                $msg .= 'Member <b>' . $mem . '</b> is allready exists. ';
                $error = 1;
              }
              else
              {
                $msg .= 'Domain <b>' . $member . '</b> is allready in use. ';
                $domainerror = 1;
              }
            }
          }
        }
      }
    }
    else
    {
      $msg .= 'Wrong URL of your page. ';
      $error = 1;
    }

    if (($linkback AND $mainlinkback))
    {
      $linkbackurl = $sendurl;
    }

    if ((!strstr ($wmmail, '@') OR strstr ($wmmail, ' ')))
    {
      $msg .= 'You have entered an invalid e-mail address. ';
      $error = 1;
    }

    if ($editmem)
    {
      if (!$pass1)
      {
        $msg .= 'You must enter a password. ';
        $error = 1;
      }
      else
      {
        if (!$wapdz)
        {
          if (!$pass2)
          {
            $msg .= 'You must enter your password in BOTH fields. ';
            $error = 1;
          }
          else
          {
            if ($pass1 != $pass2)
            {
              $msg .= 'The passwords you entered do not match. ';
              $error = 1;
            }
            else
            {
              if (12 < strlen ($pass1))
              {
                $msg .= 'Password is too long. ';
                $error = 1;
              }
            }
          }
        }
      }
    }

    if (($sendurl AND 60 < strlen ($sendurl)))
    {
      $msg .= 'URL of your page is too long. ';
      $error = 1;
    }

    if (($fakeurl AND 60 < strlen ($fakeurl)))
    {
      $msg .= 'Fake URL is too long. ';
      $error = 1;
    }

    if (($titlelength AND $titlelength < strlen ($sitetitle)))
    {
      $msg .= 'Title is too long. ';
      $error = 1;
    }

    if (($descrlength AND $descrlength < strlen ($sitedescr)))
    {
      $msg .= 'Description is too long. ';
      $error = 1;
    }

    if (($groupname[0] AND !in_array ($sitecategory, $groupname)))
    {
      $msg .= 'Wrong category. ';
      $error = 1;
    }

    if (($wmmail AND 30 < strlen ($wmmail)))
    {
      $msg .= 'Your Email is too long. ';
      $error = 1;
    }

    if (($wmicq AND 12 < strlen ($wmicq)))
    {
      $msg .= 'Your ICQ is too long. ';
      $error = 1;
    }

    if ((($wapdz AND $lng == 'Russian') AND function_exists ('iconv')))
    {
      $sitetitle = iconv ('UTF-8', 'windows-1251', $sitetitle);
      $sitedescr = iconv ('UTF-8', 'windows-1251', $sitedescr);
    }

    if (($langonly AND strlen ($langchars[$langonly])))
    {
      if (3 < strlen ($sitetitle))
      {
        $numlang = preg_match_all ('/[' . $langchars[$langonly] . ']/s', $sitetitle, $matches);
        if ($numlang < strlen ($sitetitle) / 3)
        {
          $msg .= 'Use ' . $langonly . ' only. ';
          $error = 1;
        }
      }

      if (3 < strlen ($sitedescr))
      {
        $numlang = preg_match_all ('/[' . $langchars[$langonly] . ']/s', $sitedescr, $matches);
        if ($numlang < strlen ($sitedescr) / 3)
        {
          $msg .= 'Use ' . $langonly . ' only. ';
          $error = 1;
        }
      }
    }

    if ((!$wapdz AND $noasubmit))
    {
      if (!strstr (str_replace ('www.', '', $_SERVER['HTTP_REFERER']), str_replace ('www.', '', $scripts_path)))
      {
        $msg .= 'Browser error. ';
        $error = 1;
      }
      else
      {
        if (($_COOKIE[autosubmit_index ($_SERVER['SERVER_NAME'])] != autosubmit_index (substr (time (), 0, 0 - 3)) AND $_COOKIE[autosubmit_index ($_SERVER['SERVER_NAME'])] != autosubmit_index (substr (time (), 0, 0 - 3) - 1)))
        {
          $msg .= 'Browser error. ';
          $error = 1;
        }
      }
    }

    if (($linkback AND !$linkbackurl))
    {
      $msg .= 'You must enter Link Back URL. ';
      $error = 1;
    }

    if ($linkbackurl)
    {
      if (60 < strlen ($linkbackurl))
      {
        $msg .= 'Link Back URL is too long. ';
        $error = 1;
      }
      else
      {
        if (!strstr ($linkbackurl, 'http://'))
        {
          $msg .= 'The Link Back URL MUST include http:// . ';
          $error = 1;
        }
        else
        {
          if ($sendurl)
          {
            $url1 = parse_url (strtolower ($sendurl));
            $domain1 = str_replace ('www.', '', $url1['host']);
            $url2 = parse_url (strtolower ($linkbackurl));
            $domain2 = str_replace ('www.', '', $url2['host']);
            if ($domain1 != $domain2)
            {
              $msg .= 'Link Back URL must be in the same domain. ';
              $error = 1;
            }
          }
        }
      }
    }

    if ($bannerurl)
    {
      if (60 < strlen ($bannerurl))
      {
        $msg .= 'Banner URL is too long. ';
        $error = 1;
      }
      else
      {
        if (((((!stristr ($bannerurl, '.jp') AND !stristr ($bannerurl, '.gif')) AND !stristr ($bannerurl, '.png')) AND !stristr ($bannerurl, '?')) OR strstr ($bannerurl, ' ')))
        {
          $msg .= 'Wrong Banner URL. ';
          $error = 1;
        }
      }
    }

    $blackhtml = '';
    $filename = 'datafiles/blackhtml.dat';
    if ($ff = @fopen ($filename, 'r'))
    {
      flock ($ff, 1);
      fseek ($ff, 0);
      $blackhtml = @fread ($ff, @filesize ($filename));
      flock ($ff, 3);
      fclose ($ff);
    }

    if (((!$wapdz AND $lng == 'Russian') AND function_exists ('iconv')))
    {
      $sitetitle = preg_replace ('\'[^a-zA-Z?ÿ??-9\\,\\.\\-\\:\\;\\?\\+ ]\'s', '', $sitetitle);
      $sitedescr = preg_replace ('\'[^a-zA-Z?ÿ??-9\\,\\.\\-\\:\\;\\?\\+ ]\'s', '', $sitedescr);
    }
    else
    {
      $sitetitle = preg_replace ('\'[^a-zA-Z0-9\\,\\.\\-\\:\\;\\?\\+ ]\'s', '', $sitetitle);
      $sitedescr = preg_replace ('\'[^a-zA-Z0-9\\,\\.\\-\\:\\;\\?\\+ ]\'s', '', $sitedescr);
    }

    if ($datastolower)
    {
      $sitetitle = del_upper ($sitetitle);
      $sitedescr = del_upper ($sitedescr);
    }

    $delchars .= '\'\\';
    $i = 0;
    while ($i < strlen ($delchars))
    {
      $sitetitle = str_replace ($delchars[$i], '', $sitetitle);
      $sitedescr = str_replace ($delchars[$i], '', $sitedescr);
      ++$i;
    }

    $filename = 'datafiles/blacklist.dat';
    if ($ff = @fopen ($filename, 'r'))
    {
      flock ($ff, 1);
      fseek ($ff, 0);
      $blacklist = @fread ($ff, @filesize ($filename));
      flock ($ff, 3);
      fclose ($ff);
    }

    $block = array ();
    $block = explode ('
', $blacklist);
    $ipaddress = $_SERVER['REMOTE_ADDR'];
    $checktitle = strtolower ($sitetitle . '_' . preg_replace ('\'[^a-zA-Z0-9]\'s', '', $sitetitle) . '_' . preg_replace ('\'[^a-zA-Z]\'s', '', $sitetitle));
    $checkdesc = strtolower ($sitedescr . '_' . preg_replace ('\'[^a-zA-Z0-9]\'s', '', $sitedescr) . '_' . preg_replace ('\'[^a-zA-Z]\'s', '', $sitedescr));
    $i = 0;
    while ($i < sizeof ($block))
    {
      if ($block[$i])
      {
        $checktext = strtolower ($block[$i]);
        if (((($ipaddress AND strstr ($checktext, '.')) AND 6 < strlen ($checktext)) AND strstr ($ipaddress, $checktext)))
        {
          $error = 1;
          $msg .= 'Submit error 1. ';
        }

        if (($sendurl AND stristr ($sendurl, $checktext)))
        {
          $error = 1;
          $msg .= '' . 'The URL has the blacklisted word [' . $checktext . ']. ';
        }

        if ($member == $checktext)
        {
          $error = 1;
          $msg .= '' . 'The domain ' . $username . ' has been blacklisted from this site. ';
        }

        if (($sitetitle AND strstr ($checktitle, $checktext)))
        {
          $error = 1;
          $msg .= '' . 'Site title has the blacklisted word [' . $checktext . ']. ';
        }

        if (($sitedescr AND strstr ($checkdesc, $checktext)))
        {
          $error = 1;
          $msg .= '' . 'Site description has the blacklisted word [' . $checktext . ']. ';
        }

        if ((strstr ($checktext, '@') AND strstr ($wmmail, $checktext)))
        {
          $error = 1;
          $msg .= 'Submit error 2. ';
        }
      }

      ++$i;
    }

    if ((strstr ($sitetitle, 'href') OR strstr ($sitetitle, 'http://')))
    {
      $error = 1;
      $msg .= 'Html in title. ';
    }

    if ((strstr ($sitedescr, 'href') OR strstr ($sitedescr, 'http://')))
    {
      $error = 1;
      $msg .= 'Html in description. ';
    }

    if ((!strstr ($sendurl, 'http://') AND !strstr ($sendurl, 'php')))
    {
      $msg .= 'The URL of your page MUST include http:// . ';
      $error = 1;
    }
    else
    {
      if (((!strstr ($sendurl, '.') OR strstr ($sendurl, '@')) OR strstr ($sendurl, ' ')))
      {
        $msg .= 'Wrong URL.';
        $error = 1;
      }
      else
      {
        if ((!$error AND !$domainerror))
        {
          if ((($pagesize OR $intlinks) OR trim ($blackhtml)))
          {
            $traderface = grabpage ($sendurl);
            if ($traderface)
            {
              if (($pagesize AND strlen ($traderface) < $pagesize))
              {
                $error = 1;
                $msg .= 'Wrong site. ';
              }
              else
              {
                if ($intlinks)
                {
                  $num = 0;
                  preg_match_all ('/ href=[\\"\']*([^\\>\\"\']+)[\\>\\"\' ]/', $traderface, $matches);
                  if ((is_array ($matches[1]) AND count ($matches[1])))
                  {
                    foreach ($matches[1] as $v)
                    {
                      if ((strlen ($v) AND (!strstr ($v, 'http://') OR strstr ($v, $sendurl))))
                      {
                        ++$num;
                        continue;
                      }
                    }
                  }

                  if ($num < $intlinks)
                  {
                    $msg .= 'Wrong site. ';
                    $error = 1;
                  }
                }
              }
            }
            else
            {
              $msg .= 'Connection error or blank page. ';
              $error = 1;
            }
          }
        }
      }
    }

    if ($traderface)
    {
      $blockhtml = array ();
      $blockhtml = explode ('
', $blackhtml);
      $i = 0;
      while ($i < sizeof ($blockhtml))
      {
        $blhtml = trim ($blockhtml[$i]);
        if ($blhtml)
        {
          if (stristr ($traderface, $blhtml))
          {
            $error = 1;
            $msg .= 'Site content breaks the rules. Do not submit this site. ';
            break;
          }
        }

        ++$i;
      }
    }

    $backcheckings = '';
    if (((((!$error AND !$domainerror) AND $linkbackreq) AND $linkback) AND $linkbackurl))
    {
      if (($mainlinkback AND $traderface))
      {
        $grab = $traderface;
      }
      else
      {
        $grab = grabpage ($linkbackurl);
      }

      if (($grab AND stristr ($grab, $linkback)))
      {
        $backcheckings = 30;
      }
      else
      {
        $error = 1;
        $msg .= 'We can\'t find our link at your page. Please place the link and resubmit. ';
      }
    }

    $numbackwards = '';
    if (((!$wapdz AND strlen ($minbackwards)) AND $linkbackurl))
    {
      if ($backwards == 2)
      {
        $pagerank = google_pagerank ($linkbackurl);
        if ((strlen ($pagerank) AND 0 <= $pagerank))
        {
          $numbackwards = $pagerank;
          if ($pagerank < $minbackwards)
          {
            $error = 1;
            $msg .= 'Page with our link must have PageRank=' . $minbackwards . ' at least. ';
          }
        }
        else
        {
          $error = 1;
          $msg .= 'Can\'t connect to Google to check PageRank. ';
        }
      }
      else
      {
        $googlegrab = '';
        $googlegrab = implode ('', @file ('http://www.google.com/search?q=link:' . @urlencode ($linkbackurl)));
        if ($googlegrab)
        {
          $startpos = strpos ($googlegrab, 'of about <b>');
          if ($startpos)
          {
            $numbackwards = substr ($googlegrab, $startpos + 12);
          }

          if ($numbackwards)
          {
            $endpos = strpos ($numbackwards, '</b> linking to');
            if ($endpos)
            {
              $numbackwards = substr ($numbackwards, 0, $endpos);
            }
          }

          if ($numbackwards < $minbackwards)
          {
            $error = 1;
            $msg .= 'Page with our link must have ' . $minbackwards . ' backward links at least. ';
          }
        }
        else
        {
          $error = 1;
          $msg .= 'Can\'t connect to Google to check backwards. ';
        }
      }
    }

    echo '<table cellspacing="0">
';
    if ($error)
    {
      echo '<tr><td';
      echo $dz3;
      echo '>
Oops!<br/>
';
      echo $msg;
      echo '<br/><br/>
Please hit your back button and fix these errors<br/><br/>
';
      echo 'If you continue to have problems email me at <a href="mailto:' . $email . '?subject=' . $sitename . '-support">' . $email . '</a>';
      if (file_exists ('datafiles/rules3.dat'))
      {
        include 'datafiles/rules3.dat';
      }

      echo '</td></tr>
</table>
';
    }
    else
    {
      if ($domainerror)
      {
        echo '<tr><td';
        echo $dz3;
        echo '>
Oops!<br/>
';
        echo $msg;
        echo '<br/><br/>
Please hit your back button and fix these errors<br/><br/>
';
        if ((!$wapdz AND !$memberdir))
        {
          $temp = array ();
          $temp = explode ('/', $url['path']);
          $memberdir = $temp[1];
          if (($memberdir AND !strstr ($memberdir, '.')))
          {
            echo 'Also you can create account for subdirectory ';
            echo '<font size="+1">' . $member . '/' . $memberdir . '</font>';
            echo '<br/><br/>

<form method="post" action="edit.php">
<input type=hidden name=sendurl value=\'';
            echo $sendurl;
            echo '\'>
<input type=hidden name=fakeurl value=\'';
            echo $fakeurl;
            echo '\'>
<input type=hidden name=bannerurl value=\'';
            echo $bannerurl;
            echo '\'>
<input type=hidden name=linkbackurl value=\'';
            echo $linkbackurl;
            echo '\'>
<input type=hidden name=sitecategory value=\'';
            echo $sitecategory;
            echo '\'>
<input type=hidden name=memtype value=\'';
            echo $memtype;
            echo '\'>
<input type=hidden name=sitetitle value=\'';
            echo $sitetitle;
            echo '\'>
<input type=hidden name=sitedescr value=\'';
            echo $sitedescr;
            echo '\'>
<input type=hidden name=wmmail value=\'';
            echo $wmmail;
            echo '\'>
<input type=hidden name=wmicq value=\'';
            echo $wmicq;
            echo '\'>
<input type=hidden name=pass1 value=\'';
            echo $pass1;
            echo '\'>
<input type=hidden name=pass2 value=\'';
            echo $pass2;
            echo '\'>
<input type=hidden name=memberdir value=\'';
            echo $memberdir;
            echo '\'>
<input type=submit name=newaccount value=\'Create account for subdirectory\'>
</form>
<br/>
';
          }
        }

        echo 'If you continue to have problems signing up please email me at <a href="mailto:';
        echo $email;
        echo '?subject=Problem signing up with ';
        echo $sitename;
        echo '">';
        echo $email;
        echo '</a>';
        if ($icq)
        {
          echo ' or icq me at ' . $icq;
        }

        echo '.
</td></tr>
</table>
';
      }
      else
      {
        $userag = $_SERVER['HTTP_USER_AGENT'];
        if ($userag)
        {
          $userag = str_replace ('|', '', substr ($userag, 0, 20));
        }

        $data = time () . '|' . time () . '|' . $wmmail . '|' . $wmicq . '|' . $pass1 . '|0|0|0|0|0|0|' . $fakeurl . '|' . $bannerurl . '|1||' . $sendurl . '|' . $linkbackurl . '|' . $member . '|' . $sitecategory . '|0|0|0|' . $sitetitle . '|' . $sitedescr . '|' . $numbackwards . '|0|0|0|0||' . $backcheckings . '|' . $memtype . '|||||0|0|' . $_SERVER['REMOTE_ADDR'] . ' ' . $userag . '|||';
        safe_write ('memberfiles/' . $mem . '.dat', $data);
        @chmod ('memberfiles/' . $mem . '.dat', 438);
        $sendhits = $scripts_path . '/';
        if ($indenter)
        {
          $sendhits .= $sitecategory . '.php';
        }

        if (!$sitetype)
        {
          if ($use_tradeid)
          {
            $sendhits .= '?id=' . $mem;
          }
          else
          {
            if ($memberdir)
            {
              $sendhits .= '?dir=1';
            }
          }
        }

        echo '<tr><th>' . showtext ('Thanks for signing up to') . ' ' . $sitename . '</th></tr><tr><td' . $dz3 . '>';
        echo showtext ('Username') . ': <b>' . $mem . '</b><br/>';
        if ($editmem)
        {
          echo showtext ('Password') . ': <b>' . $pass1 . '</b><br/><br/>';
        }

        echo showtext ('Place this link at your page') . ':<br/>';
        if ($wapdz)
        {
          echo '<a href="' . $sendhits . '"><small>' . $sendhits . '</small></a>';
        }
        else
        {
          echo '<a href="' . $sendhits . '"><font size="+1">' . $sendhits . '</font></a>';
        }

        echo '<br/><br/>';
        include 'datafiles/rules2.dat';
        echo '<br/><br/>';
        if (!$sitetype)
        {
          echo showtext ('You may start sending and recieving hits immediately') . '.<br/>';
        }

        if ((!$manualid AND !$sitetype))
        {
          echo showtext ('All hits from domain') . ' <b>' . $member . '</b> ' . showtext ('will be counted as your hits') . '.<br/>';
        }

        echo showtext ('Email me for any questions') . ' <a href="mailto:' . $email . '?subject=Link exchange with ' . $sitename . '">' . $email . '</a>';
        if ($icq)
        {
          echo ' ' . showtext ('or icq me at') . ' ' . $icq;
        }

        echo '.<br/>';
        echo '</td></tr>
</table>
<br/>
';
        $subject = showtext ('Account Submitted to') . ' "' . $sitename . '"';
        $Message = showtext ('Your account has been added to') . ' "' . $sitename . '".' . '
';
        if ($approve)
        {
          $Message .= showtext ('Account will be listed after review') . '.
';
        }

        if (!$sitetype)
        {
          $Message .= showtext ('You may start sending hits immediately') . '.
';
        }

        $Message .= showtext ('Place this link at your page') . (('' . ': ' . $sendhits . '
') . '
');
        if ((!$manualid AND !$sitetype))
        {
          $Message .= showtext ('All hits from domain') . ' ' . $member . ' ' . showtext ('will be counted as your hits') . '.

';
        }

        if ($editmem)
        {
          $Message .= showtext ('Edit account and view stats') . (('' . ':
WWW: ' . $scripts_path . '/edit.php
WAP: ' . $scripts_path . '/edit.php?wap=1
Username: ' . $mem . '
Password: ' . $pass1 . '
') . '
');
        }

        mail ($wmmail, $subject, $Message, mail_headers ($email));
        if ($mailadded)
        {
          $subject = 'An account has been submitted to your site "' . $sitename . '"';
          $Message = (('' . 'Account has been added to ' . $scripts_path . '/ami.php

Username: ' . $mem . '
URL: ' . $sendurl . '
Title: ' . $sitetitle . '
Description: ' . $sitedescr . '
Category: ' . $sitecategory . '
Banner: ' . $bannerurl . '
ICQ: ' . $wmicq . '
') . '
');
          if ($approve)
          {
            $Message .= (('' . 'Quick approve: ' . $scripts_path . '/ami.php?quickapprove=' . $mem . '&aplog=' . $mylogin . '
') . '
');
          }

          mail ($email, $subject, $Message, mail_headers ($wmmail));
        }

        if ($updateadded)
        {
          forceupdate ();
        }
      }
    }
  }
  else
  {
    if ((($_POST['showstats'] OR $_POST['updatemember']) OR $_POST['editmember']))
    {
      $who = str_replace ('.', '', $who);
      if ((!$who OR !file_exists ('memberfiles/' . $who . '.dat')))
      {
        echo '<table>
<tr><td align="center">
Ooops!<br/>
That user name does not exist in the database.<br/><br/>
Please hit your back button and try again<br/><br/>
If you continue to have problems email me at <a href="mailto:';
        echo $email;
        echo '?subject=Problem editing account at ';
        echo $sitename;
        echo '">';
        echo $email;
        echo '</a>';
        if ($icq)
        {
          echo ' or icq me at ' . $icq;
        }

        echo ' and be sure to include the name of your site.
</td></tr>
</table>
';
        echo '</div></body></html>';
        exit ();
      }

      $memberdatas = array ();
      read_explode ('memberfiles/' . $who . '.dat', '|', $memberdatas);
      $membername = $who;
      if ($memberdatas[4] != $pass1)
      {
        echo '<table>
<tr><td align="center">
Error!<br/>
The Password you entered is incorrect.<br/><br/>
If you continue to have problems email me at <a href="mailto:';
        echo $email;
        echo '?subject=Problem editing account at ';
        echo $sitename;
        echo '">';
        echo $email;
        echo '</a>';
        if ($icq)
        {
          echo ' or icq me at ' . $icq;
        }

        echo ' and be sure to include the name of your site.
</td></tr>
</table>
';
        echo '</div></body></html>';
        exit ();
      }

      if ($memberdatas[4] == '')
      {
        echo '<table>
<tr><td align="center">
Error!<br/>
That function has been disabled, sorry<br/><br/>
You can email me at <a href=\'mailto:';
        echo $email;
        echo '?subject=Problem editing account at ';
        echo $sitename;
        echo '\'>';
        echo $email;
        echo '</a>';
        if ($icq)
        {
          echo ' or icq me at ' . $icq;
        }

        echo ' and be sure to include the name of your site and I\'ll get back to you with that information.
</td></tr>
</table>
';
        echo '</div></body></html>';
        exit ();
      }

      if ($_POST['updatemember'])
      {
        $error = 0;
        if ((!strstr ($wmmail, '@') OR strstr ($wmmail, ' ')))
        {
          $msg .= 'You have entered an invalid e-mail address. ';
          $error = 1;
        }

        if (($wmmail AND 30 < strlen ($wmmail)))
        {
          $msg .= 'Your Email is too long. ';
          $error = 1;
        }

        if (!$pass2)
        {
          $msg .= 'You must enter a password. ';
          $error = 1;
        }

        if (60 < strlen ($sendurl))
        {
          $msg .= 'URL of your page is too long. ';
          $error = 1;
        }

        if (($fakeurl AND 60 < strlen ($fakeurl)))
        {
          $msg .= 'Fake URL is too long. ';
          $error = 1;
        }

        if (($titlelength AND $titlelength < strlen ($sitetitle)))
        {
          $msg .= 'Title is too long. ';
          $error = 1;
        }

        if (($descrlength AND $descrlength < strlen ($sitedescr)))
        {
          $msg .= 'Description is too long. ';
          $error = 1;
        }

        if (($linkbackurl AND !strstr ($linkbackurl, 'http://')))
        {
          $msg .= 'The Link Back URL MUST include http:// . ';
          $error = 1;
        }

        if (($bannerurl AND ((((!stristr ($bannerurl, '.jp') AND !stristr ($bannerurl, '.gif')) AND !stristr ($bannerurl, '.png')) AND !stristr ($bannerurl, '?')) OR strstr ($bannerurl, ' '))))
        {
          $msg .= 'Wrong Banner URL. ';
          $error = 1;
        }

        if (($wmicq AND 12 < strlen ($wmicq)))
        {
          $msg .= 'Your ICQ is too long. ';
          $error = 1;
        }

        $blackhtml = '';
        $filename = 'datafiles/blackhtml.dat';
        if ($ff = @fopen ($filename, 'r'))
        {
          flock ($ff, 1);
          fseek ($ff, 0);
          $blackhtml = @fread ($ff, @filesize ($filename));
          flock ($ff, 3);
          fclose ($ff);
        }

        if ($sendurl != $memberdatas[15])
        {
          if (($nourlchange AND $sendurl != $memberdatas[15]))
          {
            $msg .= 'You can\'t change the URL. ';
            $error = 1;
          }
          else
          {
            if ((!strstr ($sendurl, 'http://') AND !strstr ($sendurl, 'php')))
            {
              $msg .= 'URL of your page MUST include http:// . ';
              $error = 1;
            }
            else
            {
              if (!strstr ($sendurl, '.'))
              {
                $msg .= 'Wrong URL.';
                $error = 1;
              }
              else
              {
                if (($pagesize OR trim ($blackhtml)))
                {
                  $traderface = grabpage ($sendurl);
                  if ($traderface)
                  {
                    if (($pagesize AND strlen ($traderface) < $pagesize))
                    {
                      $error = 1;
                      $msg .= 'Wrong site. ';
                    }
                  }
                  else
                  {
                    $msg .= 'Connection error. ';
                    $error = 1;
                  }
                }
              }
            }
          }
        }

        $filename = 'datafiles/blacklist.dat';
        if ($ff = @fopen ($filename, 'r'))
        {
          flock ($ff, 1);
          fseek ($ff, 0);
          $blacklist = @fread ($ff, @filesize ($filename));
          flock ($ff, 3);
          fclose ($ff);
        }

        $block = array ();
        $block = explode ('
', $blacklist);
        $ipaddress = $_SERVER['REMOTE_ADDR'];
        $checktitle = strtolower ($sitetitle . '_' . preg_replace ('\'[^a-zA-Z0-9]\'s', '', $sitetitle) . '_' . preg_replace ('\'[^a-zA-Z]\'s', '', $sitetitle));
        $checkdesc = strtolower ($sitedescr . '_' . preg_replace ('\'[^a-zA-Z0-9]\'s', '', $sitedescr) . '_' . preg_replace ('\'[^a-zA-Z]\'s', '', $sitedescr));
        $i = 0;
        while ($i < sizeof ($block))
        {
          if ($block[$i])
          {
            $checktext = strtolower ($block[$i]);
            if (($sendurl AND stristr ($sendurl, $checktext)))
            {
              $error = 1;
              $msg .= '' . 'The URL has the blacklisted word [' . $checktext . ']. ';
            }

            if (($sitetitle AND strstr ($checktitle, $checktext)))
            {
              $error = 1;
              $msg .= '' . 'Site title has the blacklisted word [' . $checktext . ']. ';
            }

            if (($sitedescr AND strstr ($checkdesc, $checktext)))
            {
              $error = 1;
              $msg .= '' . 'Site description has the blacklisted word [' . $checktext . ']. ';
            }
          }

          ++$i;
        }

        if ($sendurl != $memberdatas[15])
        {
          $blockhtml = array ();
          $blockhtml = explode ('
', $blackhtml);
          $i = 0;
          while ($i < sizeof ($blockhtml))
          {
            $blhtml = trim ($blockhtml[$i]);
            if ($blhtml)
            {
              if (stristr ($traderface, $blhtml))
              {
                $error = 1;
                $msg .= 'Site content breaks the rules. Do not submit this site. ';
              }
            }

            ++$i;
          }
        }

        if ((($adcat AND $memberdatas[18] == $adcat) AND $costperclick < $minperclick))
        {
          $error = 1;
          $msg .= '' . 'Minimal cost per click ' . $minperclick . '. ';
        }

        if ($msg)
        {
          echo '	<table>
	<tr><td align="center">
	Error!<br/>
	';
          echo $msg;
          echo '<br/><br/>
	If you continue to have problems please email me at <a href="mailto:';
          echo $email;
          echo '?subject=Problem editing account at ';
          echo $sitename;
          echo '">';
          echo $email;
          echo '</a>';
          if ($icq)
          {
            echo ' or icq me at ' . $icq;
          }

          echo '.
	</td></tr>
	</table>
	';
          echo '</div></body></html>';
          exit ();
        }

        if ($datastolower)
        {
          $sitetitle = del_upper ($sitetitle);
          $sitedescr = del_upper ($sitedescr);
        }

        $delchars .= '\'\\';
        $i = 0;
        while ($i < strlen ($delchars))
        {
          $sitetitle = str_replace ($delchars[$i], '', $sitetitle);
          $sitedescr = str_replace ($delchars[$i], '', $sitedescr);
          ++$i;
        }

        $memberdatas[2] = $wmmail;
        $memberdatas[15] = $sendurl;
        $memberdatas[12] = $bannerurl;
        $memberdatas[11] = $fakeurl;
        $memberdatas[22] = $sitetitle;
        $memberdatas[23] = $sitedescr;
        $memberdatas[18] = $sitecategory;
        $memberdatas[31] = $memtype;
        $memberdatas[3] = $wmicq;
        $memberdatas[4] = $pass2;
        $memberdatas[16] = $linkbackurl;
        $memberdatas[40] = $costperclick;
        $data = implode ('|', $memberdatas);
        if (safe_write ('memberfiles/' . $who . '.dat', $data))
        {
          echo '<font color="#ff0000"><b>Your data is updated successfully</b></font><br/><br/>';
        }
        else
        {
          'Can not write in file ' . $who . '.dat<br/>';
        }

        if ($mailedited)
        {
          $subject = 'Member data has been changed at your site ' . $sitename;
          $Message = (('' . 'Member data has been changed at ' . $scripts_path . '/admin.php

Username: ' . $who . '
URL: ' . $sendurl . '
Title: ' . $sitetitle . '
Description: ' . $sitedescr . '
Banner: ' . $bannerurl . '
ICQ: ' . $wmicq . '
') . '
');
          if ($approve)
          {
            $Message .= (('' . 'Quick approve: ' . $scripts_path . '/ami.php?quickapprove=' . $mem . '&aplog=' . $mylogin . '
') . '
');
          }

          mail ($email, $subject, $Message, mail_headers ($wmmail));
        }
      }

      echo '<table cellspacing="0">
<tr><td';
      echo $dz3;
      echo '>
';
      if ($wapdz)
      {
        echo '<table cellspacing="0" width="100%"><tr><th>' . $who . '</th></tr></table>';
      }
      else
      {
        echo '<font size="+1">';
        if ($memberdatas[18] == $adcat)
        {
          echo 'Advertiser';
        }
        else
        {
          echo 'Member';
        }

        echo ' Information for ' . $who . '</font>';
      }

      echo '<table cellspacing="0" width="100%">
<tr valign="top"><td>
';
      if ($wapdz)
      {
        echo '<form method="post" action="edit.php">
';
        if ($_POST['showstats'])
        {
          echo '<input type="submit" name="editmember" value="Edit info"/>';
        }
        else
        {
          echo '<input type="submit" name="showstats" value="View stats"/>';
        }

        echo '<input type=\'hidden\' name=\'who\' value=\'';
        echo $who;
        echo '\'/>
<input type=\'hidden\' name=\'pass1\' value=\'';
        echo $memberdatas[4];
        echo '\'/>
<input type="hidden" name="wap" value="1"/>\'
</form>
';
      }

      if ((!$wapdz OR !$_POST['showstats']))
      {
        echo '<form method="post" action="edit.php">
<table cellspacing="0" width="100%">

<tr><th';
        echo $dz1;
        echo '>
';
        if ($memberdatas[18] == $adcat)
        {
          echo 'Advertiser';
        }
        else
        {
          echo 'Member';
        }

        echo ' Information
</th></tr>
<tr><td>Username</td>';
        echo $dz2;
        echo '<td><i>';
        echo $who;
        echo '</i></td></tr>
<input type="hidden" name="pass1" value="';
        echo $memberdatas[4];
        echo '"/>
<tr><td>New Password</td>';
        echo $dz2;
        echo '<td><input type=\'text\' name=\'pass2\' value=\'';
        echo $memberdatas[4];
        echo '\'/></td></tr>
<tr><td>Title</td>';
        echo $dz2;
        echo '<td><input type=\'text\' name=\'sitetitle\' value=\'';
        echo $memberdatas[22];
        echo '\'';
        if (!$wapdz)
        {
          echo ' size="30"';
        }

        if ($titlelength)
        {
          echo ' maxlength="' . $titlelength . '"';
        }

        echo '/></td></tr>
<tr><td>Description</td>';
        echo $dz2;
        echo '<td><input type=\'text\' name=\'sitedescr\' value=\'';
        echo $memberdatas[23];
        echo '\'';
        if (!$wapdz)
        {
          echo ' size="30"';
        }

        if ($descrlength)
        {
          echo ' maxlength="' . $descrlength . '"';
        }

        echo '/></td></tr>
<tr><td>Site URL</td>';
        echo $dz2;
        echo '<td>
';
        if ($nourlchange)
        {
          echo '<i>' . $memberdatas[15] . '</i> <input type="hidden" name="sendurl" value="' . $memberdatas[15] . '"/>';
        }
        else
        {
          echo '<input type="text" name="sendurl" value="' . $memberdatas[15] . '"/>';
        }

        echo '</td></tr>
';
        if ($memberdatas[18] == $adcat)
        {
          echo '<input type=\'hidden\' name=\'bannerurl\' value=\'';
          echo $memberdatas[12];
          echo '\'/>
<input type=\'hidden\' name=\'fakeurl\' value=\'';
          echo $memberdatas[11];
          echo '\'/>
<input type=\'hidden\' name=\'linkbackurl\' value=\'';
          echo $memberdatas[16];
          echo '\'/>
<input type=\'hidden\' name=\'sitecategory\' value=\'';
          echo $memberdatas[18];
          echo '\'/>
<input type=\'hidden\' name=\'memtype\' value=\'';
          echo $memberdatas[31];
          echo '\'/>
';
        }
        else
        {
          if ($usebanners)
          {
            echo '<tr><td>Banner URL</td>';
            echo $dz2;
            echo '<td><input type=\'text\' name=\'bannerurl\' value=\'';
            echo $memberdatas[12];
            echo '\'/></td></tr>
';
          }
          else
          {
            echo '<input type="hidden" name="bannerurl" value="' . $memberdatas[12] . '"/>';
          }

          if ($usefakeurl)
          {
            echo '<tr><td>Fake URL</td>';
            echo $dz2;
            echo '<td><input type=\'text\' name=\'fakeurl\' value=\'';
            echo $memberdatas[11];
            echo '\'/></td></tr>
';
          }
          else
          {
            echo '<input type="hidden" name="fakeurl" value="' . $memberdatas[11] . '"/>';
          }

          if (($linkback AND !$mainlinkback))
          {
            echo '<tr><td>Link Back URL</td>';
            echo $dz2;
            echo '<td><input type=\'text\' name=\'linkbackurl\' value=\'';
            echo $memberdatas[16];
            echo '\'/></td></tr>
';
          }
          else
          {
            echo '<input type="hidden" name="linkbackurl" value="' . $memberdatas[16] . '"/>';
          }

          if (1 < count ($groupname))
          {
            echo '<tr><td>Category</td>';
            echo $dz2;
            echo '<td>
';
            echo '<s';
            echo 'elect name=\'sitecategory\'>
';
            $i = 0;
            while ($i < sizeof ($groupname))
            {
              $selopt = '';
              if ($memberdatas[18] == $groupname[$i])
              {
                $selopt = ' selected="1"';
              }

              echo '<option value="' . $groupname[$i] . '"' . $selopt . '>' . $grouptitle[$i] . '</option>
';
              ++$i;
            }

            echo '</select>
</td></tr>
';
          }
          else
          {
            echo '<input type="hidden" name="sitecategory" value="' . $memberdatas[18] . '"/>';
          }

          if ($TYPES)
          {
            echo '<tr><td>Site Type</td>';
            echo $dz2;
            echo '<td>
';
            echo '<s';
            echo 'elect name=\'memtype\'>
';
            $typename = array ();
            $typename = explode (',', $TYPES);
            $i = 0;
            while ($i < sizeof ($typename))
            {
              if ($typename[$i] == $memberdatas[31])
              {
                $sel_val = 'selected="1"';
              }
              else
              {
                $sel_val = '';
              }

              echo '' . '<option ' . $sel_val . '>' . $typename[$i] . '</option>
';
              ++$i;
            }

            echo '</select>
</td></tr>
';
          }
          else
          {
            echo '<input type="hidden" name="memtype" value="' . $memberdatas[31] . '"/>';
          }
        }

        echo '<tr><td>Email</td>';
        echo $dz2;
        echo '<td><input type=\'text\' name=\'wmmail\' value=\'';
        echo $memberdatas[2];
        echo '\'/></td></tr>
';
        if ($icqsubmit)
        {
          echo '<tr><td>ICQ</td>';
          echo $dz2;
          echo '<td><input type=\'text\' name=\'wmicq\' value=\'';
          echo $memberdatas[3];
          echo '\'/></td></tr>
';
        }
        else
        {
          echo '<input type="hidden" name="wmicq" value="' . $memberdatas[3] . '"/>';
        }

        echo '<tr><td';
        echo $dz1 . $dz3;
        echo '>
';
        if ($wapdz)
        {
          echo '<input type="hidden" name="wap" value="1"/>';
        }

        echo '<input type=\'hidden\' name=\'who\' value=\'';
        echo $who;
        echo '\'/>
<input type=\'submit\' name=\'updatemember\' value=\'Update\'/>
</td></tr>
</table>
</form>

</td>
';
        echo $dz4;
        echo '<td>
';
      }

      if (($adcat AND $memberdatas[18] == $adcat))
      {
        if ((!$wapdz OR $_POST['showstats']))
        {
          echo '<table cellspacing="0" width="100%">
<tr><th colspan="2">Stats</th></tr>
<tr id="r"><td>Hits Out for Current Period</td><td>';
          echo $memberdatas[9];
          echo '</td></tr>
<tr id="r"><td>Hits Out for Last ';
          echo $reranks;
          echo ' Periods</td><td>';
          echo $memberdatas[21];
          echo '</td></tr>
<tr id="r"><td>Total Hits Out</td><td>';
          echo $memberdatas[10];
          echo '</td></tr>
<tr id="r"><td>Cost per click</td><td><input type=\'text\' name=\'costperclick\' value=\'';
          echo $memberdatas[40];
          echo '\'></td></tr>
<tr id="r"><td>Deposit</td><td>';
          echo $memberdatas[39];
          echo '</td></tr>
</table>
';
        }

        echo '</td></tr></table>
</td></tr><tr><td>
';
        if ((!$wapdz OR $_POST['showstats']))
        {
          echo '<table cellspacing="1" width="100%">
';
          hourlystats ($who, 1);
          echo '</table>
';
        }
      }
      else
      {
        if (!$sitetype)
        {
          if ((!$wapdz OR $_POST['showstats']))
          {
            echo '
';
            $bads = $badalert = 0;
            if (!$rateby)
            {
              $allclicks = $memberdatas[7] + $memberdatas[20];
              $goodclicks = $allclicks;
              if ($allclicks)
              {
                $badlangclicks = ($memberdatas[36] + $memberdatas[37]) / $allclicks;
                if (0 < $badlangclicks)
                {
                  $badlangclicks = round (100 * $badlangclicks);
                }

                $bads = ($memberdatas[27] + $memberdatas[28]) / $allclicks;
                if (($hblimit AND $hblimit < $bads))
                {
                  $badalert = 1;
                }

                if (0 < $bads)
                {
                  $bads = round (100 * $bads);
                }
              }
              $allclicks = $memberdatas[20];
          $badlangclicks = $memberdatas[37];
          $badclicks = $memberdatas[28];
          $badoverclicks = $badclicks - $allclicks * $badclickslimit;
          if ($badoverclicks < 0)
          {
            $badoverclicks = 0;
          }
              $goodclicks = $allclicks - $badoverclicks;
          if ($allclicks)
          {
            $goodclicks -= $badlangclicks * (1 - $badlangratio) * $goodclicks / $allclicks;
          }

          echo '';

          echo '';
              echo '';


              echo '
<tr id="r"><td>';


              echo '</td></tr>
';
            }

            }

          echo '</td></tr></table>
</td></tr>
<tr><td';
          echo $dz3;
          echo '>
';
          if ((!$wapdz OR $_POST['showstats']))
          {
            echo '<table cellspacing="1" width="100%">
';
            hourlystats ($who, 0);
            echo '</table>
';
            echo '<br/>
';
            if ($badalert)
            {
              echo '';
            }
            else
            {
              if (60 < $bads)
              {
                echo '';
              }
            }

            if ($memberdatas[18] != $adcat)
            {
              $sendhits = $scripts_path . '/';
              if ($indenter)
              {
                $sendhits .= $sitecategory . '.php';
              }

              if (!$sitetype)
              {
                if ($use_tradeid)
                {
                  $sendhits .= '?id=' . $who;
                }
              }

              echo 'Place this link at your site:<br/>';
              if ($wapdz)
              {
                echo '<a href="' . $sendhits . '"><small>' . $sendhits . '</small></a>';
              }
              else
              {
                echo '<a href="' . $sendhits . '"><font size="+1">' . $sendhits . '</font></a>';
              }

              echo '<br/>';
              $sitecategory = $memberdatas[18];
              include 'datafiles/rules2.dat';
              echo '<br/>';
            }
          }

          echo '</td></tr>
</table>
<br/>
';
        }
      }
    }
    else
    {
      if (($_GET['passremind'] OR $_POST['passremind']))
      {
        $found = 0;
        if ($member)
        {
          $mem = str_replace ('.', '', $member);
          $filename = 'memberfiles/' . $mem . '.dat';
          if (file_exists ($filename))
          {
            $memberdatas = array ();
            read_explode ($filename, '|', $memberdatas);
            $wmmail = $memberdatas[2];
            remindmail ($mem, $memberdatas[4], $wmmail);
            $found = 1;
          }
          else
          {
            echo 'Member <b>' . $member . '</b> does not exist<br/>';
          }
        }
        else
        {
          if ($wmmail)
          {
            $memberfilenames = array ();
            $d = dir ('memberfiles');
            while ($entry = $d->read ())
            {
              if (strstr ($entry, '.dat'))
              {
                $memberfilenames[] = $entry;
                continue;
              }
            }

            $d->close ();
            $i = 0;
            while ($i < sizeof ($memberfilenames))
            {
              $filename = 'memberfiles/' . $memberfilenames[$i];
              $memberdatas = array ();
              if (read_explode ($filename, '|', $memberdatas))
              {
                if ($memberdatas[2] == $wmmail)
                {
                  remindmail (str_replace ('.dat', '', $memberfilenames[$i]), $memberdatas[4], $wmmail);
                  $found += 1;
                }
              }

              ++$i;
            }

            if (!$found)
            {
              echo 'Member with email <b>' . $wmmail . '</b> does not exist<br/>';
            }
          }
        }

        if ($found)
        {
          echo 'Found ' . $found . ' account(s)<br/>Data was mailed to <b>' . $wmmail . '</b><br/>';
        }

        echo '<form method="post" action="edit.php">
<table cellspacing="1">
<tr>
	<th';
        echo $dz1;
        echo '>Password Reminder</th>
</tr><tr>
	<td class=\'rt\'>Username or domain:</td>';
        echo $dz2;
        echo '	<td><input type="text" name="member"/></td>
</tr><tr>
	<td class=\'rt\'>or your email:</td>';
        echo $dz2;
        echo '	<td><input type="text" name="wmmail"/></td>
</tr><tr>
	<td align="center"';
        echo $dz1;
        echo '>';
        if ($wapdz)
        {
          echo '<input type="hidden" name="wap" value="1"/>';
        }

        echo '<input type="submit" name="passremind" value="Remind"/></td>
</tr>
</table>
</form>
';
        if (!$wapdz)
        {
          echo '<a href="edit.php">Home</a>';
        }
      }
      else
      {
        if ((!$wapdz AND !$paydomainok))
        {
          $filename = 'datafiles/ad.dat';
          if ((!file_exists ($filename) OR 604800 < time () - filemtime ($filename)))
          {
            $adurl = 'http://topnet.in' . urlencode ($scripts_path);
            $tpl = join ('', @file ($adurl));
            if (!strstr ($tpl, 'gb top'))
            {
              $tpl = '';
            }

            if ($ff = @fopen ($filename, 'w'))
            {
              flock ($ff, 2);
              fputs ($ff, $tpl);
              flock ($ff, 3);
              fclose ($ff);
            }
            else
            {
              echo '</div></body></html>';
              exit ();
            }
          }

          include $filename;
        }

        if ($gbrules)
        {
          if ($wapdz)
          {
            echo 'Mail me - ' . str_replace ('@', '(at)', $email) . '<br/><br/>';
          }
          else
          {
            echo '<table cellspacing="1" cellpadding="3">
<tr><td>
If you have any questions, just email me at <a href=\'mailto:';
            echo str_replace ('@', '(at)', $email);
            echo '?subject=Link exchange with ';
            echo $sitename;
            echo '\'>';
            echo str_replace ('@', '(at)', $email);
            echo '</a>';
            if ($icq)
            {
              echo ' or icq me at ' . $icq;
            }

            echo '.
</td></tr>
</table>
<br/>
';
          }
        }

        if ((!$wapdz OR $WAP))
        {
          @include 'datafiles/rules.dat';
          echo '<br/><br/>';
          echo '<form method="post" action="edit.php">
<table cellspacing="0">
<tr>
	<th';
          echo $dz1;
          echo '>';
          echo showtext ('Submit New Site');
          echo '</th>
</tr><tr>
	<td class=\'rt\'>';
          echo showtext ('URL of your page');
          echo ':</td>';
          echo $dz2;
          echo '	<td><input type=\'text\' name=\'sendurl\'';
          if (!$wapdz)
          {
            echo ' size="30"';
          }

          echo ' maxlength=\'60\'/></td>
</tr><tr>
';
          if ((!$wapdz AND $usefakeurl))
          {
            echo '	<td class=\'rt\'>';
            echo showtext ('Fake URL');
            echo ':</td>';
            echo $dz2;
            echo '	<td><input type=\'text\' name=\'fakeurl\'';
            if (!$wapdz)
            {
              echo ' size="30"';
            }

            echo ' maxlength=\'60\'/></td>
</tr><tr>
';
          }

          if ($usebanners)
          {
            echo '	<td class=\'rt\'>';
            echo showtext ('Banner URL');
            echo ' (';
            echo $bannerwidth . 'x' . $bannerheight;
            echo '):</td>';
            echo $dz2;
            echo '	<td><input type=\'text\' name=\'bannerurl\'';
            if (!$wapdz)
            {
              echo ' size="30"';
            }

            echo ' maxlength=\'60\'/></td>
</tr><tr>
';
          }

          if (($linkback AND !$mainlinkback))
          {
            echo '	<td class=\'rt\'>';
            echo showtext ('Link Back URL');
            echo '<br/>(';
            echo showtext ('where you will place our link');
            echo '):</td>';
            echo $dz2;
            echo '	<td><input type=\'text\' name=\'linkbackurl\'';
            if (!$wapdz)
            {
              echo ' size="30"';
            }

            echo ' maxlength=\'60\'/></td>
</tr><tr>
';
          }

          if (1 < count ($groupname))
          {
            echo '	<td class=\'rt\'>';
            echo showtext ('Category');
            echo ':</td>';
            echo $dz2;
            echo '	<td>
	';
            echo '<s';
            echo 'elect name=\'sitecategory\'>
	<option value=""></option>
';
            $i = 0;
            while ($i < sizeof ($groupname))
            {
              $selopt = '';
              if ($cat == $groupname[$i])
              {
                $selopt = ' selected="1"';
              }

              echo '<option value="' . $groupname[$i] . '"' . $selopt . '>' . $grouptitle[$i] . '</option>
';
              ++$i;
            }

            echo '	</select>
</td>
</tr><tr>
';
          }

          if ($TYPES)
          {
            echo '	<td class=\'rt\'>';
            echo showtext ('Site type');
            echo ':</td>';
            echo $dz2;
            echo '	<td>
	';
            echo '<s';
            echo 'elect name=\'memtype\'>
';
            $typename = array ();
            $typename = explode (',', $TYPES);
            $i = 0;
            while ($i < sizeof ($typename))
            {
              echo '<option>' . $typename[$i] . '</option>' . '
';
              ++$i;
            }

            echo '	</select>
	</td>
</tr><tr>
';
          }

          echo '	<td class=\'rt\'>';
          echo showtext ('Site title');
          echo ':</td>';
          echo $dz2;
          echo '	<td><input type=\'text\' name=\'sitetitle\'';
          if (!$wapdz)
          {
            echo ' size="30"';
          }

          if ($titlelength)
          {
            echo ' maxlength="' . $titlelength . '"';
          }

          echo '/></td>
</tr><tr>
	<td class=\'rt\'>';
          echo showtext ('Site description');
          echo ':</td>';
          echo $dz2;
          echo '	<td><input type=\'text\' name=\'sitedescr\'';
          if (!$wapdz)
          {
            echo ' size="30"';
          }

          if ($descrlength)
          {
            echo ' maxlength="' . $descrlength . '"';
          }

          echo '/></td>
</tr><tr>
	<td class=\'rt\'>';
          echo showtext ('Your Email');
          echo ':</td>';
          echo $dz2;
          echo '	<td><input type=\'text\' name=\'wmmail\'';
          if (!$wapdz)
          {
            echo ' size="30"';
          }

          echo ' maxlength=\'30\'/></td>
</tr><tr>
';
          if ($icqsubmit)
          {
            echo '	<td class=\'rt\'>';
            echo showtext ('Your ICQ #');
            echo ':</td>';
            echo $dz2;
            echo '	<td><input type=\'text\' name=\'wmicq\'';
            if (!$wapdz)
            {
              echo ' size="12"';
            }

            echo ' maxlength=\'12\'/></td>
</tr><tr>
';
          }

          if ($manualid)
          {
            echo '	<td class=\'rt\'>';
            echo showtext ('Username');
            echo ':</td>';
            echo $dz2;
            echo '	<td><input type=\'text\' name=\'mem\'';
            if (!$wapdz)
            {
              echo ' size="12"';
            }

            echo ' maxlength=\'40\'/></td>
</tr><tr>
';
          }

          if ($editmem)
          {
            echo '	<td class=\'rt\'>';
            echo showtext ('Password');
            echo ':</td>';
            echo $dz2;
            echo '	<td><input type=\'password\' name=\'pass1\'';
            if (!$wapdz)
            {
              echo ' size="12"';
            }

            echo ' maxlength=\'12\'/></td>
</tr><tr>
';
            if (!$wapdz)
            {
              echo '	<td class=\'rt\'>';
              echo showtext ('Re-type your password');
              echo ':</td>
	<td><input type=\'password\' name=\'pass2\'';
              if (!$wapdz)
              {
                echo ' size="12"';
              }

              echo ' maxlength=\'12\'/></td>
</tr><tr>
';
            }
          }

          echo '	<td align="center"';
          echo $dz1;
          echo '>';
          if (count ($groupname) < 2)
          {
            echo '<input type="hidden" name="sitecategory" value="' . $groupname[0] . '"/>';
          }

          if ($wapdz)
          {
            echo '<input type="hidden" name="wap" value="1"/>';
          }

          echo '<input type=\'submit\' name=\'newaccount\' value=\'';
          echo showtext ('Add Site');
          echo '\'/></td>
</tr>
</table>
</form>
<br/><br/>
';
        }

        if ($editmem)
        {
          echo '<form method="post" action="edit.php">
<table cellspacing="0">
<tr>
	<th';
          echo $dz1;
          echo '>';
          if ($wapdz)
          {
            echo 'Edit Account / Stats';
          }
          else
          {
            echo showtext ('Edit Account / Check Stats');
          }

          echo '</th>
</tr><tr>
	<td class=\'rt\'>';
          echo showtext ('Username');
          echo ':</td>';
          echo $dz2;
          echo '	<td><input type=\'text\' name=\'who\'/></td>
</tr>
<tr>
	<td class=\'rt\'>';
          echo showtext ('Password');
          echo ':</td>';
          echo $dz2;
          echo '	<td><input type=\'password\' name=\'pass1\'/></td>
</tr>
<tr>
	<td align="center"';
          echo $dz1;
          echo '>';
          if ($wapdz)
          {
            echo '<input type="hidden" name="wap" value="1"/>';
          }

          echo '<input type=\'submit\' name=\'showstats\' value=\'';
          echo showtext ('Log In');
          echo '\'/></td>
</tr>
</table>
</form>
<a href="?passremind=1';
          if ($wapdz)
          {
            echo '&amp;wap=1';
          }

          echo '">';
          echo showtext ('Forgot Password');
          echo '</a><br/>
';
        }

        if (file_exists ('datafiles/rulesfoot.dat'))
        {
          include 'datafiles/rulesfoot.dat';
        }

        echo '<br/>
';
        if ($wapdz)
        {
          echo 'Powered by:<br/>';
          if ($paydomainok)
          {
            echo '<a href="http://wapranking.in">WapRanking.iN</a>
';
          }
          else
          {
            echo '<a href="http://wapranking.in">Add Your Site</a>
';
          }
        }
        else
        {
          echo '<a target="_blank" href="http://wapranking.in">Powered by TopNet ';
          if ($sitetype == 1)
          {
            echo 'Directory';
          }
          else
          {
            echo 'Top';
          }

          echo '</a>
';
        }
      }
    }
  }

  echo '</div>
</body>
</html>
';
  exit ();
?>
