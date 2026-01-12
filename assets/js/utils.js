

key=function(e,next){
if(document.all) k=e.keyCode;
else k=e.which;

if(k==13)
 $('#'+next).select();
};


kEnter=function(e,next){
if(document.all) k=e.keyCode;
else k=e.which;

if(k==13)
 $('#'+next).click();
};


format_num = function(input){
  var num = input.value.replace(/\,/g,''); 
  if(!isNaN(num)){ 
    if(num.indexOf('.') > -1){ 
      num = num.split('.'); 
      num[0] = num[0].toString().split('').reverse().join('')
        .replace(/(?=\d*\.?)(\d{3})/g,'$1,')
        .split('').reverse().join('').replace(/^[\,]/,''); 
      
      if(num[1].length > 5){ 
        alert('Maksimum 5 Desimal !!!'); 
        num[1] = num[1].substring(0, 5); 
      }  
      input.value = num[0] + '.' + num[1];         
    } else {
      input.value = num.toString().split('').reverse().join('')
        .replace(/(?=\d*\.?)(\d{3})/g,'$1,')
        .split('').reverse().join('').replace(/^[\,]/,''); 
    } 
  } else {
    alert('Input Harus Numerik !!!'); 
    input.value = input.value.substring(0, input.value.length-1); 
  }
};


format_int=function(input){
 var num = input.value.replace(/\,/g,'');

 if(!isNaN(num)){
  if(num.indexOf('.') > -1) {
   alert("You may not enter any decimals.");
   input.value = input.value.substring(0,input.value.length-1);
   }
 } else {
  alert('You may enter only numbers in this field!');
  input.value = input.value.substring(0,input.value.length-1);
 }
};

baru=function(windowName, URL, width, height){
 var topX = (window.screen.width / 2) - ( width / 2);
 var topY = (window.screen.height / 2) - ( height / 2);
	var newwindow=window.open(URL,windowName,'width='+width+',height='+height+',location=0,resizable=1,scrollbars=1,screenX='+topX+',screenY='+topY);
	if (window.focus) {newwindow.focus();}
};

baru_empat=function(windowName, URL, width, height){
 var topX = (window.screen.width / 2) - ( width / 2);
 var topY = (window.screen.height / 2) - ( height / 2);
	var newwindow=window.open(URL,windowName,'width='+width+',height='+height+',location=0,resizable=1,scrollbars=1,screenX='+topX+',screenY='+topY);

};

baru_lima=function(windowName, URL, width, height){
 var topX = (window.screen.width / 2) - ( width / 2);
 var topY = (window.screen.height / 2) - ( height / 2);
	var newwindow=window.open(URL,windowName,'width='+width+',height='+height+',location=0,resizable=1,scrollbars=1,screenX='+topX+',screenY='+topY);
	
};

baru_dua=function(windowName, URL, width, height){
 var topX = (window.screen.width / 2) - ( width / 2);
 var topY = (window.screen.height / 2) - ( height / 2);
	var newwindow=window.open(URL,windowName,'width='+width+',height='+height+',screenX='+topX+',screenY='+topY);
	if (window.focus) {newwindow.focus();}
};


baru_tiga=function(windowName){
 var topX = window.screen.width;
 var topY = window.screen.height;
	var newwindow=window.open(URL,windowName,'width='+width+',height='+height+',screenX='+topX+',screenY='+topY);
	if (window.focus) {newwindow.focus();}
};


function Left(str, n){
	if (n <= 0)
	    return "";
	else if (n > String(str).length)
	    return str;
	else
	    return String(str).substring(0,n);
};

function Right(str, n){
    if (n <= 0)
       return "";
    else if (n > String(str).length)
       return str;
    else {
       var iLen = String(str).length;
       return String(str).substring(iLen, iLen - n);
    }
};

var bln =new Array("","Jan","Feb","Mar","Apr","May","Jun","Jul","Aug",
                    "Sep","Oct","Nov","Dec");
                    
                    
capitAll= function(str){
		str= str.toLowerCase().replace(/([-\.']) */g,'$1 ');		
		var rx= /\b([a-z'-\.]+)\b/ig;
		str= str.replace(rx,function(w){
		return w.charAt(0).toUpperCase()+w.substring(1);
		});
		return str.replace(/^ *|(\-|') *| *$/g,'$1');
	};
	
nama_bulan=function(bulan){
  if(bulan=="01"){
    var nm_bln ="Januari";
  } else if(bulan=="02"){
     nm_bln ="Pebruari";
  } else if(bulan=="03"){
     nm_bln ="Maret";
  } else if(bulan=="04"){
     nm_bln ="April";
  } else if(bulan=="05"){
     nm_bln ="Mei";
  } else if(bulan=="06"){
     nm_bln ="Juni";
  } else if(bulan=="07"){
     nm_bln ="Juli";
  } else if(bulan=="08"){
     nm_bln ="Agustus";
  } else if(bulan=="09"){
     nm_bln ="September";
  } else if(bulan=="10"){
     nm_bln ="Oktober";
  } else if(bulan=="11"){
     nm_bln ="November";
  } else if(bulan=="12"){
     nm_bln ="Desember";
  }
  
 return nm_bln;
};

change_num=function(input){ 
 input = input.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1,').split('').reverse().join('').replace(/^[\,]/,'');
 return input;
};


function terbilang(bilangan){
  bilangan    = String(bilangan.value.replace(/\,/g,''));
  var angka   = new Array('0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');
  var kata    = new Array('','Satu','Dua','Tiga','Empat','Lima','Enam','Tujuh','Delapan','Sembilan');
  var tingkat = new Array('','Ribu','Juta','Milyar','Triliun');
  var panjang_bilangan = bilangan.length;
  if (panjang_bilangan > 15) {
    kaLimat = "Diluar Batas";
    return kaLimat;
  }
  for (i = 1; i <= panjang_bilangan; i++) {
    angka[i] = bilangan.substr(-(i),1);
  }
  i = 1;
  j = 0;
  kaLimat = "";
  while (i <= panjang_bilangan) {
    subkaLimat = "";
    kata1 = "";
    kata2 = "";
    kata3 = "";
    if (angka[i+2] != "0") {
      if (angka[i+2] == "1") {
        kata1 = "Seratus";
      } else {
        kata1 = kata[angka[i+2]] + " Ratus";
      }
    }
    if (angka[i+1] != "0") {
      if (angka[i+1] == "1") {
        if (angka[i] == "0") {
          kata2 = "Sepuluh";
        } else if (angka[i] == "1") {
          kata2 = "Sebelas";
        } else {
          kata2 = kata[angka[i]] + " Belas";
        }
      } else {
        kata2 = kata[angka[i+1]] + " Puluh";
      }
    }
    if (angka[i] != "0") {
      if (angka[i+1] != "1") {
        kata3 = kata[angka[i]];
      }
    }
    if ((angka[i] != "0") || (angka[i+1] != "0") || (angka[i+2] != "0")) {
      subkaLimat = kata1+" "+kata2+" "+kata3+" "+tingkat[j]+" ";
    }
    kaLimat = subkaLimat + kaLimat;
    i = i + 3;
    j = j + 1;
  }
  if ((angka[5] == "0") && (angka[6] == "0")) {
    kaLimat = kaLimat.replace("Satu Ribu","Seribu");
  }
  
  if(!bilangan || bilangan==0) {
    return kaLimat;  
  } else {
    return kaLimat + "Rupiah";
  }
};

function terbilang_tiga(bilangan){
  bilangan    = String(bilangan);
  var angka   = new Array('0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');
  var kata    = new Array('','Satu','Dua','Tiga','Empat','Lima','Enam','Tujuh','Delapan','Sembilan');
  var tingkat = new Array('','Ribu','Juta','Milyar','Triliun');
  var panjang_bilangan = bilangan.length;
  if (panjang_bilangan > 15) {
    kaLimat = "Diluar Batas";
    return kaLimat;
  }
  for (i = 1; i <= panjang_bilangan; i++) {
    angka[i] = bilangan.substr(-(i),1);
  }
  i = 1;
  j = 0;
  kaLimat = "";
  while (i <= panjang_bilangan) {
    subkaLimat = "";
    kata1 = "";
    kata2 = "";
    kata3 = "";
    if (angka[i+2] != "0") {
      if (angka[i+2] == "1") {
        kata1 = "Seratus";
      } else {
        kata1 = kata[angka[i+2]] + " Ratus";
      }
    }
    if (angka[i+1] != "0") {
      if (angka[i+1] == "1") {
        if (angka[i] == "0") {
          kata2 = "Sepuluh";
        } else if (angka[i] == "1") {
          kata2 = "Sebelas";
        } else {
          kata2 = kata[angka[i]] + " Belas";
        }
      } else {
        kata2 = kata[angka[i+1]] + " Puluh";
      }
    }
    if (angka[i] != "0") {
      if (angka[i+1] != "1") {
        kata3 = kata[angka[i]];
      }
    }
    if ((angka[i] != "0") || (angka[i+1] != "0") || (angka[i+2] != "0")) {
      subkaLimat = kata1+" "+kata2+" "+kata3+" "+tingkat[j]+" ";
    }
    kaLimat = subkaLimat + kaLimat;
    i = i + 3;
    j = j + 1;
  }
  if ((angka[5] == "0") && (angka[6] == "0")) {
    kaLimat = kaLimat.replace("Satu Ribu","Seribu");
  }
  return kaLimat + "Rupiah";
};

getF=function(e){ return document.getElementById(e);};


function strtolower(str) {
    return (str+'').toLowerCase();
}

function strtoupper(str) {
    return (str+'').toUpperCase();
}    

function capitalise(string) {
    return string.charAt(0).toUpperCase() + string.slice(1).toLowerCase();
}