<style type="text/css">
  .animeLogo{
    animation: animeIt 3s linear infinite;
  }
  @keyframes animeIt{
          0%,20%{
            border-radius: 10%;
            width: 250px;
            height: 250px;
          }
          20%,40%{
            border-radius: 20%;
            width: 300px;
            height: 300px;
            transform: scale(1);
          }
          40%,60%{
            border-radius: 100%;
            width: 300px;
            height: 300px;
            transform: scale(1.3);
            box-shadow: 0 0 10px gray;
          }
          60%,80%{
            border-radius: 20%;
            width: 300px;
            height: 300px;
            transform: scale(1);
          }
          80%,100%{
            border-radius: 10%;
            width: 250px;
            height: 250px;
          }

      }
</style>
<section class="">
      <div class="">
        <div class="card-body pb-0 text-center">
            <h1 class="text-muted"></h1><br><br>
            <img src="data/logo.jpg" alt="" class="animeLogo" style="opacity: .8" width="250" height="250" >
        </div>
      </div>
</section>