
<br><br><br><br><br>



<?php
echo '</br></br></br></br>';
$request = new HttpRequest();
$request->setUrl('http://107.20.199.106/restapi/sms/1/text/multi');
$request->setMethod(HTTP_METH_POST);

$request->setHeaders(array(
  'accept' => 'application/json',
  'content-type' => 'application/json',
  'authorization' => 'Basic amlsYW5pa2hhbmRha2VyOnV1djY0b2k3'
));

$request->setBody('{  
   "from":"InfoSMS",
   "to":[  
      "01520102813",
      
   ],
   "text":"Test SMS.hi hi hi "
}');

try {
  $response = $request->send();

  echo $response->getBody();
} catch (HttpException $ex) {
  echo $ex;
}
?>

________________________________
POST /restapi/sms/1/text/multi HTTP/1.1
Host: 107.20.199.106
Authorization: Basic amlsYW5pa2hhbmRha2VyOnV1djY0b2k3
Content-Type: application/json
Accept: application/json

{  
   "messages":[  
      {  
         "from":"MaSa",
         "to":[  
            "01520102813",
            "01729441455"
         ],
         "text":"May the Force be with you!"
      },
      {
   ]
}


<div class="container">

    <ol class="breadcrumb">
        <li><a href="index.html">Home</a></li>
        <li class="active">Online Result</li>
    </ol>

    <div class="row">

        <!-- Article main content -->
        <article class="col-xs-12 maincontent">
            <header class="page-header">
                <h1 class="page-title">Online Result</h1>
            </header>

            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="thin text-center">Exam Details</h3>
                        
                        <hr>

                        <form>
                            <div class="top-margin">
                                <label>Roll Number</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="top-margin">
                                <label>Batch Name</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="top-margin">
                                <label>Exam Code <span class="text-danger"></span></label>
                                <input type="text" class="form-control">
                            </div>

                            

                            <hr>

                            <div class="row">
                                
                                
                                <div class="col-lg-4 text-right">
                                    <button class="btn btn-action" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </article>
        <!-- /Article -->

    </div>
</div>