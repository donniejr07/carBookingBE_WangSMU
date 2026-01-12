window.SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;		
const recognition = new SpeechRecognition();
recognition.interimResults = true;
recognition.lang = 'id-ID';

recognition.addEventListener('result', event => {
  const transcript = event.results[0][0].transcript;
	  
 
  if(event.results[0].isFinal) {
	if(transcript.indexOf('anggota') == 0) {
	   window.location="https://pam.kospin.net/anggota";
	}
	
	if(transcript.indexOf('mau kasbon') == 0) {
	   $("#tabkasbon").trigger("click");
	}
	
	if(transcript.indexOf('mau pinjam') == 0) {
		$("#tabPengajuanPinjaman").trigger("click");		
	}
	
	if(transcript.trim()=='ajukan pinjaman') {
	   $("#btnTambahPinjaman").trigger("click");
	}
	
  }
});

recognition.addEventListener('end', recognition.start);
recognition.start();