<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Link Short | Short Your Link</title>
    <link rel="icon" type="image/png" href="search7/images/favicon.png" />
<meta name="author" content="colorlib.com">
<link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
    <link href="search7/css/main.css" rel="stylesheet" />
    <style>
    .hidden{
      display:none;
    }
    </style>
  </head>
  <body>
    <div class="s007">
      <form id="frm_submit" method="post" action="act">
        <div class="inner-form">
          <div class="basic-search">
            <div class="input-field">
              <div class="icon-wrap">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 20 20">
                  <path d="M18.869 19.162l-5.943-6.484c1.339-1.401 2.075-3.233 2.075-5.178 0-2.003-0.78-3.887-2.197-5.303s-3.3-2.197-5.303-2.197-3.887 0.78-5.303 2.197-2.197 3.3-2.197 5.303 0.78 3.887 2.197 5.303 3.3 2.197 5.303 2.197c1.726 0 3.362-0.579 4.688-1.645l5.943 6.483c0.099 0.108 0.233 0.162 0.369 0.162 0.121 0 0.242-0.043 0.338-0.131 0.204-0.187 0.217-0.503 0.031-0.706zM1 7.5c0-3.584 2.916-6.5 6.5-6.5s6.5 2.916 6.5 6.5-2.916 6.5-6.5 6.5-6.5-2.916-6.5-6.5z"></path>
                </svg>
              </div>
              <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token"   value="{{ csrf_token() }}">
              <input id="search" name="link" type="text" placeholder="วางลิงค์ที่นี่..." />
              <div class="result-count">
              <button class="btn-search" type="submit" id="act_link">ย่อ</button>
            </div>
            </div>
          </div>

          @if (Request::get('link'))
         
          <div class="advance-search" id="act_detail">
            <span class="desc">ลิงค์ของคุณ <label class="hidden" id="copied" style="color:red;">คัดลอกเรียบร้อย</label></span>  
            <div class="row">
              <div class="input-field">
                <div class="input">
                    <input type="text" size="60" name="" id="path" value="{{ url('/path') }}/{{ Request::get('short') }}" readonly>
                  <hr>
                </div>
              </div>
            </div>
            <div class="row third">
              <div class="input-field">
                <button class="btn-search" type="button" onclick="copied()">คัดลอก</button>
                <button class="btn-delete" id="delete" type="button"   onclick="redo('{{Request::get('link')}}')">แปลงใหม่</button>
              </div>
            </div>
          </div>
         @endif
        </div>
      </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
function copied() {
  var copyText = document.getElementById("path");
  copyText.select();
  document.execCommand("copy");
  $('#copied').removeClass('hidden');
  //alert("คัดลอกเรียบร้อย: " + copyText.value);
}
function redo(path) {
 // alert(path);
 $.ajax({
     url:'re_act',
     type:'get',
     data:{ path },
     success:function(data) {
    window.location.href="{{ url('/') }}?link="+path+"&short="+data+"";
     }
   });  
}
    </script>
  </body> 
</html>
