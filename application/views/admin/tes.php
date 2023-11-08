<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <!–- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags –> -->
    <title>Codeigniter page scroll load more </title>

    <!-- <!– Bootstrap –> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- <!– HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries –> -->
    <!-- <!– WARNING: Respond.js doesn’t work if you view the page via file:// –> -->
    <!-- <!–[if lt IE 9]>
                        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%20src%3D%22https%3A%2F%2Foss.maxcdn.com%2Fhtml5shiv%2F3.7.2%2Fhtml5shiv.min.js%22%3E%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="&lt;script&gt;" title="&lt;script&gt;" />
                        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%20src%3D%22https%3A%2F%2Foss.maxcdn.com%2Frespond%2F1.4.2%2Frespond.min.js%22%3E%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="&lt;script&gt;" title="&lt;script&gt;" />
                        <![endif]–> -->
</head>

<body>
    <div class="container">

        <div class="alert alert-info" style="position: fixed; width: 1140px" ;>

            <h1 style="color: #000000;">Load More Records On Button Click Using Codeigniter</h1>

            <small>By <a href="http://Trycatchclasses.com" style="color:red" ;>Trycatchclasses.com</a> </small>
        </div>
    </div>
    <div class="container" style="margin-top: 120px;">
        <h3>Ajax country list</h3>

        <table class="table">
            <thead>

                <tr>
                    <th>SN</th>
                    <th>Country name</th>

                    <th>Country code</th>
                </tr>

            </thead>
            <tbody id="ajax_table">
            </tbody>
        </table>
        <div class="container" style="text-align: center">
            <button class="btn" id="load_more" data-val="0">
                Load more..
                <!-- <img style="display: none" id="loader" src="<?php echo str_replace('index.php', '', base_url()) ?>asset/loader.GIF">  -->
            </button>
        </div>
    </div>

    <!-- <!– jQuery (necessary for Bootstrap’s JavaScript plugins) –> -->
    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%20src%3D%22https%3A%2F%2Fajax.googleapis.com%2Fajax%2Flibs%2Fjquery%2F1.11.3%2Fjquery.min.js%22%3E%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="&lt;script&gt;" title="&lt;script&gt;" />
    <!-- <!– Include all compiled plugins (below), or include individual files as needed –> -->
    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%20src%3D%22https%3A%2F%2Fmaxcdn.bootstrapcdn.com%2Fbootstrap%2F3.3.5%2Fjs%2Fbootstrap.min.js%22%3E%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="&lt;script&gt;" title="&lt;script&gt;" /><img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%3E%0A%20%20%20%20%24(document).ready(function()%7B%0A%20%20%20%20%20%20%20%20getcountry(0)%3B%0A%0A%20%20%20%20%20%20%20%20%24(%22%23load_more%22).click(function(e)%7B%0A%20%20%20%20%20%20%20%20%20%20%20%20e.preventDefault()%3B%0A%20%20%20%20%20%20%20%20%20%20%20%20var%20page%20%3D%20%24(this).data(‘val’)%3B%0A%20%20%20%20%20%20%20%20%20%20%20%20getcountry(page)%3B%0A%0A%20%20%20%20%20%20%20%20%7D)%3B%0A%20%20%20%20%20%20%20%20%2F%2Fgetcountry()%3B%0A%20%20%20%20%7D)%3B%0A%0A%20%20%20%20var%20getcountry%20%3D%20function(page)%7B%0A%20%20%20%20%20%20%20%20%24(%22%23loader%22).show()%3B%0A%20%20%20%20%20%20%20%20%24.ajax(%7B%0A%20%20%20%20%20%20%20%20%20%20%20%20url%3A%22%3C%3Fphp%20echo%20base_url()%20%3F%3Ewelcome%2FgetCountry%22%2C%0A%20%20%20%20%20%20%20%20%20%20%20%20type%3A’GET’%2C%0A%20%20%20%20%20%20%20%20%20%20%20%20data%3A%20%7Bpage%3Apage%7D%0A%20%20%20%20%20%20%20%20%7D).done(function(response)%7B%0A%20%20%20%20%20%20%20%20%20%20%20%20%24(%22%23ajax_table%22).append(response)%3B%0A%20%20%20%20%20%20%20%20%20%20%20%20%24(%22%23loader%22).hide()%3B%0A%20%20%20%20%20%20%20%20%20%20%20%20%24(‘%23load_more’).data(‘val’%2C%20(%24(‘%23load_more’).data(‘val’)%2B1))%3B%0A%20%20%20%20%20%20%20%20%20%20%20%20scroll()%3B%0A%20%20%20%20%20%20%20%20%7D)%3B%0A%20%20%20%20%7D%3B%0A%0A%20%20%20%20var%20scroll%20%20%3D%20function()%7B%0A%20%20%20%20%20%20%20%20%24(‘html%2C%20body’).animate(%7B%0A%20%20%20%20%20%20%20%20%20%20%20%20scrollTop%3A%20%24(‘%23load_more’).offset().top%0A%20%20%20%20%20%20%20%20%7D%2C%201000)%3B%0A%20%20%20%20%7D%3B%0A%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="&lt;script&gt;" title="&lt;script&gt;" />
    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cstyle%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%23response%7Bdisplay%3A%20none%7D%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20div%20%23fb%2C%20div%20%23gp%2C%20div%20%23tw%7Bdisplay%3A%20inline-block%3B%7D%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%23fb%7Bwidth%3A%20180px%3B%7D%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%23gp%7Bwidth%3A%20%20100px%3B%7D%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%23tw%7Bwidth%3A%20180px%3B%7D%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3C%2Fstyle%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="&lt;style&gt;" title="&lt;style&gt;" />

    <div id="fb-root"></div>

    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%3E(function(d%2C%20s%2C%20id)%20%7B%0A%09%09%09%09%09%20%20var%20js%2C%20fjs%20%3D%20d.getElementsByTagName(s)%5B0%5D%3B%0A%09%09%09%09%09%20%20if%20(d.getElementById(id))%20return%3B%0A%09%09%09%09%09%20%20js%20%3D%20d.createElement(s)%3B%20js.id%20%3D%20id%3B%0A%09%09%09%09%09%20%20js.src%20%3D%20%22%2F%2Fconnect.facebook.net%2Fen_US%2Fsdk.js%23xfbml%3D1%26version%3Dv2.7%22%3B%0A%09%09%09%09%09%20%20fjs.parentNode.insertBefore(js%2C%20fjs)%3B%0A%09%09%09%09%09%7D(document%2C%20’script’%2C%20’facebook-jssdk’))%3B%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="&lt;script&gt;" title="&lt;script&gt;" />

    <div>

        <div id="tw">
            <a href="https://twitter.com/trycatchclasses" class="twitter-follow-button" data-show-count="false" data-size="medium">Follow @trycatchclasses</a>
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%3E!function(d%2Cs%2Cid)%7Bvar%20js%2Cfjs%3Dd.getElementsByTagName(s)%5B0%5D%2Cp%3D%2F%5Ehttp%3A%2F.test(d.location)%3F’http’%3A’https’%3Bif(!d.getElementById(id))%7Bjs%3Dd.createElement(s)%3Bjs.id%3Did%3Bjs.src%3Dp%2B’%3A%2F%2Fplatform.twitter.com%2Fwidgets.js’%3Bfjs.parentNode.insertBefore(js%2Cfjs)%3B%7D%7D(document%2C%20’script’%2C%20’twitter-wjs’)%3B%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="&lt;script&gt;" title="&lt;script&gt;" />
        </div>
        <div id="gp">
            <!-- <!– Place this tag in your head or just before your close body tag. –> -->
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%20src%3D%22https%3A%2F%2Fapis.google.com%2Fjs%2Fplatform.js%22%20async%20defer%3E%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="&lt;script&gt;" title="&lt;script&gt;" />
            <!-- <!– Place this tag where you want the +1 button to render. –> -->

            <div class="g-plusone" data-href="https://plus.google.com/+TryCatchClassesMumbai"></div>
        </div>
        <div id="fb">

            <div class="fb-like" data-href="https://www.facebook.com/TryCatchClasses/" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>

        </div>

    </div>

</body>

</html>