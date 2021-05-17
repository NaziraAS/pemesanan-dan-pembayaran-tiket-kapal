let bayar=document.getElementById('bayar');


bayar.addEventListener('click', function(){
    let month=["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    let date=new Date;
    let tanggal=date.getDate();
    let bulan=date.getMonth();
    let jam=date.getHours();
    console.log(tanggal);
    let menit=date.getMinutes();
    let detik=date.getSeconds();


var countDownDate=new Date(`Apr ${tanggal+1} 2021 ${jam}:00:00`).getTime();
function newYear(){
    var now=new Date().getTime();
    gap=countDownDate-now;
     var detik=1000; 
     var menit=detik*60;
     var jam=menit*60;
     var hari=jam*24;
     

     var h=Math.floor(gap/(hari));
     var j=Math.floor( (gap % (hari) )/ (jam));
     var m=Math.floor( (gap % (jam)  )/ (menit) );
     var d=Math.floor( (gap % (menit))/(detik));
     document.getElementById('jam').innerHTML=j+':'+m+':'+d;
    //  let j=Math.floor((gap)/(jam));
    //  let m=Math.floor( (gap%(jam)) / (menit) );
    //  let d=Math.floor( (gap%(menit))/(detik));
    //  document.getElementById('jam').innerHTML=j+':'+m+':'+d;

}
setInterval(function(){
    newYear();
},1000);
});