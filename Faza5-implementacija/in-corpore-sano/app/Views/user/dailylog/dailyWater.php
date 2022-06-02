<!--        Teodora Glisic 19/0572-->
<div class="row">
      <div class="col-12">
        <h3 class="hh3">Water Log</h3>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="offset-1 col-3 ">
 
        <img src="/assets/images/dailylog/log-water.jpg" style="border-style: solid; border-radius: 50%; border-color: #fe6d73;">
        <p class="h3" style="color: #fe6d73;">Water input: <?=$unos ?> ml</p>
      </div>
      <div class=" col-lg-8 col-sm-12" style="text-align: center;">
          <form action="/user/water/" method="post">
        <input type="number" style="margin-top: 15%; background-color: #ffffff !important; text-align: center;
          border-color: #fe6d73 !important; color: black" name="water">ml
         <input value="+Add"   type="submit" name= "acceptbtn">
          </form>
      </div>
    </div>
  </div>
