
    let view=document.getElementById('view');
    let nominal=document.getElementById('nominal');
    let idpemesanan=document.getElementById('idpemesanan');

    let date=new Date;
var month = [];
month[0] = "Jan";
month[1] = "Feb";
month[2] = "Mar";
month[3] = "Apr";
month[4] = "May";
month[5] = "Jun";
month[6] = "Jul";
month[7] = "Augt";
month[8] = "Sep";
month[9] = "Oct";
month[10] = "Nov";
month[11] = "Dec";
var bulan = month[date.getMonth()];

let tahun=date.getFullYear();
let tanggal=date.getDate();
    let jam=date.getHours();
    let menit=date.getMinutes();
    let detik=date.getSeconds();
    
   
    var countDownDate=new Date(`${bulan} ${tanggal+1} ${tahun} ${jam}:00:00`).getTime();
    if(nominal.innerHTML){

        let x= setInterval(function(){
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
     document.getElementById('view').innerHTML=j+':'+m+':'+d;
    //  let j=Math.floor((gap)/(jam));
    //  let m=Math.floor( (gap%(jam)) / (menit) );
    //  let d=Math.floor( (gap%(menit))/(detik));
    //  document.getElementById('jam').innerHTML=j+':'+m+':'+d;

    if(gap<0){
    view.innerHTML="EXPIRED";
    let konfirmasi=confirm("Waktu pembayaran anda sudah habis, silahkan kembali ke hamalan menu");
    if(konfirmasi == true){
                    let xhr=new XMLHttpRequest();
                    xhr.onreadystatechange=function(){
                        if(xhr.readyState==4 && xhr.status==200){
                            clearInterval(x);
                            window.location.replace('http://localhost/tiket_kapal/');
                        }
                    }
                xhr.open('GET', 'http://localhost/tiket_kapal/Pembayaran/clearPemesanan/'+idpemesanan.value,true);
                xhr.send();
                }
            }
        },1000);
}else{
    window.location.replace('http://localhost/tiket_kapal/');
}

// $('.tes').on('click', function(){
//     console.log('ok')
// })




 