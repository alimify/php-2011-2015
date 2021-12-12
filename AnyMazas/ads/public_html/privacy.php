<?php
require 'config2.php';
require 'func.php';
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
require 'func_s.php';

print $top;
include 'css.php';
print '<title>Privacy of WapSmsBd.Com</title></head><body>';

include 'head.php';
print '<h1>Privacy Policy</h1><div class="box">- At WapSmsBd.Com, we respect and protect the privacy of our customers and those who use our website. The following Privacy Statement provides details about how your personal information is collected and used. This privacy statement applies to the network of WapSmsBd.Com websites, products and services that are located in, but not limited to the WapSmsBd.Com. In domains. <br/><br/>- WapSmsBd.Com is the sole owner of information collected on this site. We will not sell, share, or rent this information to others in ways different from what is disclosed in this statement. WapSmsBd.Com collects information from our users at several different points on our website. <br/><br/>- We will never share, sell, or rent your personal information with third parties for their promotional use. Occasionally, we enter into contracts with third parties so that they can assist us in servicing you (for example, providing customer service). The contracts prohibit them from using any of your personal information for their own purposes, and they are required to maintain the confidentiality of the information we provide to them. We may also disclose information to partners who introduced you to WapSmsBd.Com services in order to ensure they are properly compensated for their efforts. Lastly, we may disclose or report personal information in limited circumstances where we believe in good faith that disclosure is required under the law. For example, we may be required to disclose personal information to cooperate with regulators or law enforcement authorities, to comply with a legal process such as court order, subpoena, search warrant, or law enforcement request. <br/><br/>- If we decide to change our privacy policy, we will post those changes on the WapSmsBd.Com Website. So our users are always aware of what information we collect, how we use it, and under what circumstances, if any, we disclose it. Please do not hesitate to contact us. </div>';

include 'foot.php';
print $foot;
?>