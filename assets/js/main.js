function vratiRVreme(nizL,nizRV){
  for(var i=0;i < nizL.length;i++){
    
    if(nizL[0][i]['id_radno_vreme']==[nizRV[0][i]['id_radno_vreme']]){
      return ` <span>${nizRV[0][i]['pocetak'].split(":",2).join(":")}-${nizRV[0][i]['kraj'].split(":",2).join(":")}</span>`
    }
  }
   
}
function dohvatiKorisnika(id){
  var korisnici=AjaxCallBack('korisniciAjax','JSON');
  for(var k=0; k<korisnici.length;k++){
    if(korisnici[k]['id_korisnik']==id){
      return korisnici[k];
    }
  }
}
function izbrisi(kutijaID){

  var korpa2=JSON.parse(localStorage.getItem('korpa2'));
  var novaKorpa2=[];
  var korpa=JSON.parse(localStorage.getItem('korpa'));
  var novaKorpa=[];
  for(var x =0;x < korpa2.length;x++){
    if(kutijaID!=korpa2[x]['id_NarucenaKutija']){
      novaKorpa2.push(korpa2[x]);
    }
  }
  localStorage.setItem('korpa2',JSON.stringify(novaKorpa2));
  for(var x =0;x < korpa.length;x++){
    if(kutijaID!=korpa[x]['id_NarucenaKutija']){
      novaKorpa.push(korpa[x]);
    }
  }
  localStorage.setItem('korpa',JSON.stringify(novaKorpa));

  if(novaKorpa.length == 0 || novaKorpa2.length == 0){
    location.reload();
  }
  ispisiKorpu();
  
}
function izbrisi2(kutijaID){
 
  var korpa2=JSON.parse(localStorage.getItem('korpa2'));
  var novaKorpa2=[];
  var korpa=JSON.parse(localStorage.getItem('korpa'));
  var novaKorpa=[];
  for(var x =0;x < korpa2.length;x++){
    if(kutijaID!=korpa2[x]['id_NarucenaKutija']){
      novaKorpa2.push(korpa2[x]);
    }
  }
  localStorage.setItem('korpa2',JSON.stringify(novaKorpa2));
  for(var x =0;x < korpa.length;x++){
    if(kutijaID!=korpa[x]['id_NarucenaKutija']){
      novaKorpa.push(korpa[x]);
    }
  }
  localStorage.setItem('korpa',JSON.stringify(novaKorpa));

  if(novaKorpa.length == 0 || novaKorpa2.length == 0){
    location.reload();
  }
  document.getElementById('order_items').innerHTML=ispisiKorpu2();
  var kolicinaInput=document.getElementsByClassName('item_count');
for(var k=0;k<kolicinaInput.length;k++){

 $(kolicinaInput[k]).children('#plus').on('click',function(){
  povecajKol2($(this).parent().attr('data-nark'));
   
   })
 $(kolicinaInput[k]).children('#minus').on('click',function(){
  smanjiKol2($(this).parent().attr('data-nark'));

 })
 }
 var dugmeObrisi=document.getElementsByClassName('delete');
  
   for(var d=0;d<dugmeObrisi.length;d++){
    $(dugmeObrisi[d]).on('click',function(){
      izbrisi2($(this).attr('data-del'));
    })
   }
}
function ispisiKorpu(){

  document.getElementById('order_body').innerHTML=`
        <div class='cart_body'>
          <button class="flavors_backBtn" id="flavors_back_btn2" >Odustani</button>
                <h3 class='Bungee'>Vaša korpa</h3>
            <div class='korpa'>
                <hr>`
              +dohvatiSladoledePoKutiji()+
              
            `<div class="dugme"><button id='porudzbina_kraj2'>poruči</button></div></div>
                
         </div>
        
  `;
  var kolicinaInput=document.getElementsByClassName('item_count');
  for(var k=0;k<kolicinaInput.length;k++){
   $(kolicinaInput[k]).children('#plus').on('click',function(){
    povecajKol($(this).parent().attr('data-nark'));
   
     })
   $(kolicinaInput[k]).children('#minus').on('click',function(){
    smanjiKol($(this).parent().attr('data-nark'));
 
   })
   }
 var dugmeObrisi=document.getElementsByClassName('delete');
 for(var d=0;d<dugmeObrisi.length;d++){
  $(dugmeObrisi[d]).on('click',function(){
    izbrisi($(this).attr('data-del'));
  })
 }

 

 var dugmeKorpaOdustani=document.getElementById('flavors_back_btn2');
 dugmeKorpaOdustani.addEventListener('click',function(){
  localStorage.removeItem('korpa');
  localStorage.removeItem('korpa2');
  localStorage.removeItem('adresa');
  window.location.reload();
 })
 var zavrsiKupovinu2=document.getElementById('porudzbina_kraj2');
 zavrsiKupovinu2.addEventListener('click',function(){
  
ispisiNarudzbinu()
var napraviPorudzbinu=document.getElementById('kreirajPorudzbinu');
napraviPorudzbinu.addEventListener('click',function(){
  
  var ukC=$('.totalSvega').children('h3').html();
  var orderInfo=JSON.parse(localStorage.getItem('orderInfo'));



  var korpa2=JSON.parse(localStorage.getItem('korpa2'));
  var ukkc=0;
  for(var k=0; k<korpa2.length;k++){
      ukkc+=korpa2[k]['ukupnaCena'];

  }
  console.log(ukkc);
  
  orderInfo['ukupnaCena']=ukkc;
  localStorage.setItem('orderInfo',JSON.stringify(orderInfo));
  var counter=5;
  UspesnoPoruceno=`<div class='d-flex flex-column justify-content-center align-items-center porudzbinaUspeh'><h3 class='Bungee'>Uspešno ste poručili! :)</h3> <p class='Bungee'>${counter}</p></div>`;
  var korpa=JSON.parse(localStorage.getItem('korpa'));
  var porudzbina=JSON.parse(localStorage.getItem('orderInfo'));
 if(porudzbina['nacin_Placanja'] !=0 && porudzbina['nacin_Placanja'] !=null && porudzbina['dan'] != null && porudzbina['vreme'] != null) {
console.log('uspeh');

for(var k=0; k<korpa.length;k++){

AjaxForward('poruceniUkusi','JSON',korpa[k]);

}
AjaxForward('napraviPorudzbinu','JSON',porudzbina); 
document.getElementById('order_body').innerHTML=UspesnoPoruceno;

 setInterval(function(){
  counter--;
  document.getElementById('order_body').innerHTML=`<div class='d-flex flex-column justify-content-center align-items-center porudzbinaUspeh'><h3 class='Bungee'>Uspešno ste poručili! :)</h3> <p class='Bungee'>${counter}</p></div>`;
  console.log(counter);
  if(counter == 0){
    window.location.reload();
  }
}, 1000);
}
  
})
 });
 }
 function povecajKol2(kutijaID){
  
  var korpaLS=JSON.parse(localStorage.getItem('korpa2'));
  var korpaZaSlanje=JSON.parse(localStorage.getItem('korpa'));
  var novaKorpaZaSlanje=[];
  var novaKorpaZaLS=[];
  



  for(var k=0; k <korpaLS.length;k++){
    var objekat={};
    objekat['ukusi']=korpaLS[k]['ukusi'];
    objekat['cena']=korpaLS[k]['cena'];
    objekat['kutijaId']=korpaLS[k]['kutijaId'];
    objekat['kolicina']=korpaLS[k]['kolicina'];
    objekat['ukupnaCena']=korpaLS[k]['cena']*korpaLS[k]['kolicina'];
    objekat['id_NarucenaKutija']=korpaLS[k]['id_NarucenaKutija'];
    objekat['id_korisnik']=korpaLS[k]['korisnik'];
   
    if(korpaLS[k]['id_NarucenaKutija']==kutijaID){
      
      objekat['kolicina']=korpaLS[k]['kolicina']+1;
      objekat['ukupnaCena']=korpaLS[k]['cena']*objekat['kolicina'];
    }
    
    novaKorpaZaLS.push(objekat);
  }

  localStorage.setItem('korpa2',JSON.stringify(novaKorpaZaLS));
  
    for(var x=0;x< korpaZaSlanje.length;x++){
      var objekatZaKorpuZaSlanje={};
      objekatZaKorpuZaSlanje['cena']=korpaZaSlanje[x]['cena'];
      objekatZaKorpuZaSlanje['id_ukus0']=korpaZaSlanje[x]['id_ukus0'];
      objekatZaKorpuZaSlanje['id_ukus1']=korpaZaSlanje[x]['id_ukus1'];
      objekatZaKorpuZaSlanje['id_ukus2']=korpaZaSlanje[x]['id_ukus2'];
      objekatZaKorpuZaSlanje['id_NarucenaKutija']=korpaZaSlanje[x]['id_NarucenaKutija'];
      objekat['id_korisnik']=korpaZaSlanje[x]['korisnik'];
      if(korpaZaSlanje[x]['id_ukus3'] !=null){
        objekatZaKorpuZaSlanje['id_ukus3']=korpaZaSlanje[x]['id_ukus3'];
      }
      objekatZaKorpuZaSlanje['id_kutija']=korpaZaSlanje[x]['id_kutija'];
     
      objekatZaKorpuZaSlanje['korisnik']=korpaZaSlanje[x]['korisnik'];
      objekatZaKorpuZaSlanje['kolicina']=korpaZaSlanje[x]['kolicina'];
          if(kutijaID==korpaZaSlanje[x]['id_NarucenaKutija']){
            objekatZaKorpuZaSlanje['id_NarucenaKutija']=korpaZaSlanje[x]['id_NarucenaKutija'];
            objekatZaKorpuZaSlanje['kolicina']=korpaZaSlanje[x]['kolicina']+1;
           
          }
         
          novaKorpaZaSlanje.push(objekatZaKorpuZaSlanje);
          
    }
    
  localStorage.setItem('korpa',JSON.stringify(novaKorpaZaSlanje));

  document.getElementById('order_items').innerHTML=ispisiKorpu2();
  var kolicinaInput=document.getElementsByClassName('item_count');
  for(var k=0;k<kolicinaInput.length;k++){

   $(kolicinaInput[k]).children('#plus').on('click',function(){
    povecajKol2($(this).parent().attr('data-nark'));
     
     })
   $(kolicinaInput[k]).children('#minus').on('click',function(){
    smanjiKol2($(this).parent().attr('data-nark'));
 
   })
   }
   var dugmeObrisi=document.getElementsByClassName('delete');
  
   for(var d=0;d<dugmeObrisi.length;d++){
    $(dugmeObrisi[d]).on('click',function(){
      izbrisi2($(this).attr('data-del'));
    })
   }


 
}

function smanjiKol2(kutijaID,){
 
  var korpaLS=JSON.parse(localStorage.getItem('korpa2'));
  var novaKorpaZaLS=[];
  var korpaZaSlanje=JSON.parse(localStorage.getItem('korpa'));
  var novaKorpaZaSlanje=[];
  var inputVr=$(this).siblings('input');
  
  var ukCena;
 
  for(var k=0; k <korpaLS.length;k++){
    var objekat={};
    objekat['ukusi']=korpaLS[k]['ukusi'];
    objekat['cena']=korpaLS[k]['cena'];
    objekat['kutijaId']=korpaLS[k]['kutijaId'];
    objekat['kolicina']=korpaLS[k]['kolicina'];
    objekat['ukupnaCena']=korpaLS[k]['cena']*korpaLS[k]['kolicina'];
    objekat['id_NarucenaKutija']=korpaLS[k]['id_NarucenaKutija'];
    objekat['id_korisnik']=korpaLS[k]['korisnik'];
    if(korpaLS[k]['id_NarucenaKutija']==kutijaID){
      if(objekat['kolicina'] >1){
        objekat['kolicina']=korpaLS[k]['kolicina']-1;

      }
     
      objekat['ukupnaCena']=korpaLS[k]['cena']*objekat['kolicina'];
    }
    
    novaKorpaZaLS.push(objekat);

  }
  localStorage.setItem('korpa2',JSON.stringify(novaKorpaZaLS));
  for(var x=0;x< korpaZaSlanje.length;x++){
    var objekatZaKorpuZaSlanje={};
    objekatZaKorpuZaSlanje['cena']=korpaZaSlanje[x]['cena'];
    objekatZaKorpuZaSlanje['id_ukus0']=korpaZaSlanje[x]['id_ukus0'];
    objekatZaKorpuZaSlanje['id_ukus1']=korpaZaSlanje[x]['id_ukus1'];
    objekatZaKorpuZaSlanje['id_ukus2']=korpaZaSlanje[x]['id_ukus2'];
    objekatZaKorpuZaSlanje['id_NarucenaKutija']=korpaZaSlanje[x]['id_NarucenaKutija'];
    objekat['id_korisnik']=korpaZaSlanje[x]['korisnik'];
    if(korpaZaSlanje[x]['id_ukus3'] !=null){
      objekatZaKorpuZaSlanje['id_ukus3']=korpaZaSlanje[x]['id_ukus3'];
    }
    objekatZaKorpuZaSlanje['id_kutija']=korpaZaSlanje[x]['id_kutija'];
   
    objekatZaKorpuZaSlanje['korisnik']=korpaZaSlanje[x]['korisnik'];
    objekatZaKorpuZaSlanje['kolicina']=korpaZaSlanje[x]['kolicina'];
        if(kutijaID==korpaZaSlanje[x]['id_NarucenaKutija']){
          objekatZaKorpuZaSlanje['id_NarucenaKutija']=korpaZaSlanje[x]['id_NarucenaKutija'];
          if(objekatZaKorpuZaSlanje['kolicina'] >1){
            objekatZaKorpuZaSlanje['kolicina']=korpaZaSlanje[x]['kolicina']-1;
          }
         
         
        }
       
        novaKorpaZaSlanje.push(objekatZaKorpuZaSlanje);
    
  }
  
localStorage.setItem('korpa',JSON.stringify(novaKorpaZaSlanje));
  
document.getElementById('order_items').innerHTML=ispisiKorpu2();
   

var kolicinaInput=document.getElementsByClassName('item_count');
for(var k=0;k<kolicinaInput.length;k++){

 $(kolicinaInput[k]).children('#plus').on('click',function(){
 
  povecajKol2($(this).parent().attr('data-nark'));
    
 
   })
 $(kolicinaInput[k]).children('#minus').on('click',function(){

  smanjiKol2($(this).parent().attr('data-nark'));
  
 })
 }
 var dugmeObrisi=document.getElementsByClassName('delete');
  
   for(var d=0;d<dugmeObrisi.length;d++){
    $(dugmeObrisi[d]).on('click',function(){
      izbrisi2($(this).attr('data-del'));
    })
   }


 
}
function povecajKol(kutijaID){

  var korpaLS=JSON.parse(localStorage.getItem('korpa2'));
  var korpaZaSlanje=JSON.parse(localStorage.getItem('korpa'));
  var novaKorpaZaSlanje=[];
  var novaKorpaZaLS=[];
 


  
  for(var k=0; k <korpaLS.length;k++){
    var objekat={};
    objekat['ukusi']=korpaLS[k]['ukusi'];
    objekat['cena']=korpaLS[k]['cena'];
    objekat['kutijaId']=korpaLS[k]['kutijaId'];
    objekat['kolicina']=korpaLS[k]['kolicina'];
    objekat['ukupnaCena']=korpaLS[k]['cena']*korpaLS[k]['kolicina'];
    objekat['id_NarucenaKutija']=korpaLS[k]['id_NarucenaKutija'];
    objekat['id_korisnik']=korpaLS[k]['korisnik'];
    if(korpaLS[k]['id_NarucenaKutija']==kutijaID){
      
      objekat['kolicina']=korpaLS[k]['kolicina']+1;
      objekat['ukupnaCena']=korpaLS[k]['cena']*objekat['kolicina'];
    }
    
    novaKorpaZaLS.push(objekat);
  }
  
  localStorage.setItem('korpa2',JSON.stringify(novaKorpaZaLS));
  
    for(var x=0;x< korpaZaSlanje.length;x++){
      var objekatZaKorpuZaSlanje={};
      objekatZaKorpuZaSlanje['cena']=korpaZaSlanje[x]['cena'];
      objekatZaKorpuZaSlanje['id_ukus0']=korpaZaSlanje[x]['id_ukus0'];
      objekatZaKorpuZaSlanje['id_ukus1']=korpaZaSlanje[x]['id_ukus1'];
      objekatZaKorpuZaSlanje['id_ukus2']=korpaZaSlanje[x]['id_ukus2'];
      objekatZaKorpuZaSlanje['id_NarucenaKutija']=korpaZaSlanje[x]['id_NarucenaKutija'];
      objekat['id_korisnik']=korpaZaSlanje[x]['korisnik'];
      if(korpaZaSlanje[x]['id_ukus3'] !=null){
        objekatZaKorpuZaSlanje['id_ukus3']=korpaZaSlanje[x]['id_ukus3'];
      }
      objekatZaKorpuZaSlanje['id_kutija']=korpaZaSlanje[x]['id_kutija'];
     
      objekatZaKorpuZaSlanje['korisnik']=korpaZaSlanje[x]['korisnik'];
      objekatZaKorpuZaSlanje['kolicina']=korpaZaSlanje[x]['kolicina'];
     
          if(kutijaID==korpaZaSlanje[x]['id_NarucenaKutija']){
            objekatZaKorpuZaSlanje['id_NarucenaKutija']=korpaZaSlanje[x]['id_NarucenaKutija'];
            objekatZaKorpuZaSlanje['kolicina']=korpaZaSlanje[x]['kolicina']+1;
           
          }
         
          novaKorpaZaSlanje.push(objekatZaKorpuZaSlanje);
        
    }
    
  localStorage.setItem('korpa',JSON.stringify(novaKorpaZaSlanje));

  ispisiKorpu();

 


 
}

function smanjiKol(kutijaID,){
 
  var korpaLS=JSON.parse(localStorage.getItem('korpa2'));
  var novaKorpaZaLS=[];
  var korpaZaSlanje=JSON.parse(localStorage.getItem('korpa'));
  var novaKorpaZaSlanje=[];
  var inputVr=$(this).siblings('input');
  
  var ukCena;
 
  for(var k=0; k <korpaLS.length;k++){
    var objekat={};
    objekat['ukusi']=korpaLS[k]['ukusi'];
    objekat['cena']=korpaLS[k]['cena'];
    objekat['kutijaId']=korpaLS[k]['kutijaId'];
    objekat['kolicina']=korpaLS[k]['kolicina'];
    objekat['ukupnaCena']=korpaLS[k]['cena']*korpaLS[k]['kolicina'];
    objekat['id_NarucenaKutija']=korpaLS[k]['id_NarucenaKutija'];
    objekat['id_korisnik']=korpaLS[k]['korisnik'];
    if(korpaLS[k]['id_NarucenaKutija']==kutijaID){
      if(objekat['kolicina'] >1){
        objekat['kolicina']=korpaLS[k]['kolicina']-1;

      }
     
      objekat['ukupnaCena']=korpaLS[k]['cena']*objekat['kolicina'];
    }
    
    novaKorpaZaLS.push(objekat);

  }
  localStorage.setItem('korpa2',JSON.stringify(novaKorpaZaLS));
  for(var x=0;x< korpaZaSlanje.length;x++){
    var objekatZaKorpuZaSlanje={};
    objekatZaKorpuZaSlanje['cena']=korpaZaSlanje[x]['cena'];
    objekatZaKorpuZaSlanje['id_ukus0']=korpaZaSlanje[x]['id_ukus0'];
    objekatZaKorpuZaSlanje['id_ukus1']=korpaZaSlanje[x]['id_ukus1'];
    objekatZaKorpuZaSlanje['id_ukus2']=korpaZaSlanje[x]['id_ukus2'];
    objekatZaKorpuZaSlanje['id_NarucenaKutija']=korpaZaSlanje[x]['id_NarucenaKutija'];
    objekatZaKorpuZaSlanje['id_korisnik']=korpaZaSlanje[x]['korisnik'];
    if(korpaZaSlanje[x]['id_ukus3'] !=null){
      objekatZaKorpuZaSlanje['id_ukus3']=korpaZaSlanje[x]['id_ukus3'];
    }
    objekatZaKorpuZaSlanje['id_kutija']=korpaZaSlanje[x]['id_kutija'];
   
    objekatZaKorpuZaSlanje['korisnik']=korpaZaSlanje[x]['korisnik'];
    objekatZaKorpuZaSlanje['kolicina']=korpaZaSlanje[x]['kolicina'];
        if(kutijaID==korpaZaSlanje[x]['id_NarucenaKutija']){
          objekatZaKorpuZaSlanje['id_NarucenaKutija']=korpaZaSlanje[x]['id_NarucenaKutija'];
          if(objekatZaKorpuZaSlanje['kolicina'] >1){
            objekatZaKorpuZaSlanje['kolicina']=korpaZaSlanje[x]['kolicina']-1;
          }
         
         
        }
       
        novaKorpaZaSlanje.push(objekatZaKorpuZaSlanje);
      
  }
  
localStorage.setItem('korpa',JSON.stringify(novaKorpaZaSlanje));
  
  ispisiKorpu();
   

 
 


 
}
function ispisiSladoledePoKutiji(nizNaziva){
  var ispis2="";


    for(var n =0;n<nizNaziva.length;n++){
      
      ispis2+=nizNaziva[n]+',';
    }
  
      
      ispis2=ispis2.slice(0,-1);
      return ispis2;
 }
function dohvatiSladoledePoKutiji(){
  var nizNaziva=[];
  var nizObjKutija=[];
  var ispis="";
        var izvucenaKorpa=JSON.parse(localStorage.getItem('korpa'));
        var sladoledNazivi=AjaxCallBack('sladolediAjax','JSON');
       var kutije=AjaxCallBack('kutijeAjax','JSON');
       
       for(var i=0;i < izvucenaKorpa.length;i++){
        
        nizNaziva=[];
        var objKutija={
          
          ukusi:[],
          kutijaId:'',
          
  }
        for(const [key,value] of Object.entries(izvucenaKorpa[i])){
      
          if(key.startsWith('id_ukus')){
            for(var s=0;s<sladoledNazivi[0].length;s++){
              
                  if(value == sladoledNazivi[0][s]['id_sladoled']){
                    nizNaziva.push(sladoledNazivi[0][s]['naziv']);
                  }
               
          }
        }

        }
            objKutija['id_NarucenaKutija']=i+1;
            objKutija['ukusi']=nizNaziva;
            objKutija['kutijaId']=izvucenaKorpa[i]['id_kutija'];
            objKutija['cena']=izvucenaKorpa[i]['cena'];
            objKutija['kolicina']=1;
            objKutija['ukupnaCena']=objKutija['cena']*objKutija['kolicina'];
            objKutija['id_korisnik']=izvucenaKorpa[i]['korisnik'];
            nizObjKutija.push(objKutija);
            
            
            
     

          }
          if(localStorage.getItem('korpa2') == null || localStorage.getItem('korpa2') == []){
               
            localStorage.setItem('korpa2',JSON.stringify(nizObjKutija));
            
          }
          var korpa2LS=JSON.parse(localStorage.getItem('korpa2'));
          var ukupnaCenaSvega=0;
            for(var o=0; o< korpa2LS.length;o++){
            ukupnaCenaSvega+=korpa2LS[o]['ukupnaCena'];
             for(var x=0; x< kutije[0].length;x++){
              if(kutije[0][x]['id_kutija']==korpa2LS[o]['kutijaId']){
                var kutija=kutije[0][x];
                
                
               
               
              }
             }
          
              
              ispis+=`<div class='row1 flex-md-row flex-column'>
              <div class='cart_item_info d-flex flex-column '>
              <h5 class='font-linotte' id='nameItem'>${kutija['naziv_kutije']} ${kutija['kolicina_kg']*1000}gr:`+ispisiSladoledePoKutiji(korpa2LS[o]['ukusi'])+`</h5>
              <p id='priceItem'>${korpa2LS[o]['cena']}.00RSD</p>
              </div>
              <div class='d-flex flex-row justify-content-center align-items-center'>
              <div class='item_count d-flex' data-narK='${korpa2LS[o]['id_NarucenaKutija']}'>
                        <span id='minus' >-</span>
                        <input type='number' readonly value='${korpa2LS[o]['kolicina']}' class='input_count'>
                        <span id='plus' >+</span>

              </div>
              <div class='total' id='total'>
                      <span class='font-Linotte ukCena'>${korpa2LS[o]['ukupnaCena']}</span><span class="font-Linotte">RSD</span>
              </div>
              <div class="delete m-3" id='delete' data-del='${korpa2LS[o]['id_NarucenaKutija']}'><i class="fas fa-minus-circle"></i></div>
              </div>
          </div>
      
          `
    
             }
           ispis+=`<hr><div class="totalSvega"><h3 class='font-Linotte'>${ukupnaCenaSvega}.00RSD</h3></div>
           `;
           
 return ispis;
  
 }
function ispisiKorpu2(){

  var ispis=`
        <div class='cart_body'>
          
                
            <div class='korpa'>
                `
              +dohvatiSladoledePoKutiji()+
            `</div>
                
         </div>
        
  `;
  

 



 return ispis;
 }
function ispisiKategorijeSlad(){
      var kategorije = AjaxCallBack('kategorijeAjax','JSON');
      var ispis='';
      for(var i=0;i <kategorije[0].length;i++){
        ispis+=`
        
            
            <li class="kategorije" data-category='${kategorije[0][i]['naziv']}'>${[kategorije[0][i]['naziv']]}</li>
            
         `
      }
   
        return ispis;
}
function filtriraj(kliknutaKategorija,SladNiz){
  var SladNiz=document.querySelectorAll('.flavour_content');
  for(var z = 0;z < SladNiz.length;z++){
    if(kliknutaKategorija != 'SVI SLADOLEDI'){
     
 if($(SladNiz[z]).data('category') == kliknutaKategorija){
  SladNiz[z].classList.add('vidljivost');
  SladNiz[z].classList.remove('poluvidljivost');
     
 }
 else{
   
  SladNiz[z].classList.remove('vidljivost');  
  SladNiz[z].classList.add('poluvidljivost');    
              
 }
}
else{
SladNiz[z].classList.add('vidljivost');
SladNiz[z].classList.remove('poluvidljivost');  
 
}

}
}
function IzabranaKutija(kutijaId){
  var kutijaNiz=AjaxCallBack('kutijeAjax','JSON');
  var kutija={};
  for(var k =0; k< kutijaNiz[0].length;k++){
    if(kutijaNiz[0][k]['id_kutija']==kutijaId){
      kutija=kutijaNiz[0][k];
    }
  }
  return kutija;
}
function novSlad(niz){
  var niz=document.querySelectorAll('.flavour_content');
  
  for(var y = 0; y < niz.length;y++){
  
    var razlika=Math.abs(Date.parse(Date())-Date.parse(niz[y].children[0].getAttribute('data-date')));
    var razlikaDana=Math.ceil(razlika/(1000*60*60*24));
    
    if(razlikaDana > 60){
      niz[y].removeChild(niz[y].children[0]);
     
    }
    
  }
 
 }

function ispisiSladolede(niz){
  var kategorije= AjaxCallBack('kategorijeAjax','JSON');
  var listaUkusa=document.getElementById('ukusIspis');
  var ispis='';

  for(var s =0;s<niz[0].length;s++){
    var nazivKat='';

    for(var k=0;k <kategorije[0].length;k++){
      
      if(niz[0][s].kategorija_id == kategorije[0][k].id_kategorija){
          nazivKat= kategorije[0][k].naziv;
       
      }
      
 
    }
    ispis+=`
    <li class="flavour">
        <div class="flavour_content vidljivost" data-category='${nazivKat}'>
            <div class="novo" data-date="${niz[0][s].datum_izlaska}"></div>
            <img src="../assets/img/${niz[0][s].slika}" class="img-fluid slad_order" data-sladOrderID="${niz[0][s].id_sladoled}">
        <span class="text-center">${niz[0][s].naziv}</span>`   
        +prica(niz[0][s].id_sladoled);
        +`
    </div>
    </li>
    `
  }

  listaUkusa.innerHTML=ispis;
  var sladdNiz=document.querySelectorAll('.flavour_content');
  novSlad(sladdNiz);   
  if(stranica == "flavors.php")    
  document.getElementById('opisUkusa').addEventListener('click',function(){
    var idSladPrica=$(this).attr('data-idSladoledaOpis');
    modalUkusa(idSladPrica);
  })
}
function prica(id){

   var nizSlad=AjaxCallBack('sladolediAjax','JSON');

  for(var x=0;x < nizSlad[0].length;x++){
    console.log(nizSlad[0]);
    if(nizSlad[0][x].id_sladoled==id){
      if(nizSlad[0][x].Opis !=null){
        return `<div class="opis" id='opisUkusa' data-idSladoledaOpis="${nizSlad[0][x]['id_sladoled']}"><p>+</p></div>`
      }
      else{
        return '';
      }
    }
  
  
  }
}
function modalUkusa(id){
  var ispis="";
  var nizSlad=AjaxCallBack('sladolediAjax','JSON');
  for(var n=0;n < nizSlad[0].length;n++){
    if(nizSlad[0][n].id_sladoled==id){
      ispis+=`
          <Div ><img src="../assets/img/${nizSlad[0][n].slika}" width='100' height='100'><div><h3>${nizSlad[0][n].naziv}</h3>
            <p>${nizSlad[0][n].Opis}</p></div>
            </Div>
      `
    }
  }
  document.getElementById('modalUkusa').classList.add('d-visible');
  document.getElementById('modalUkusa').classList.remove('d-none');
  document.getElementById('bg_modal').addEventListener('click',function(){
    document.getElementById('modalUkusa').classList.add('d-none');
  })
  document.getElementById('pop').innerHTML=ispis;

}

function dohvatiSladoled(id){
  nizSlad=AjaxCallBack('sladolediAjax','JSON');
  
  var sladoled={};
  for(var s=0;s <nizSlad[0].length;s++){
    if(nizSlad[0][s]['id_sladoled']==id){
     sladoled=nizSlad[0][s];
    }
  }
  return sladoled;
}
var swiper = new Swiper(".clients", {
    slidesPerView: 3,
    spaceBetween: 10,
    loop: true,
    
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  
    breakpoints:{
      0:{
        slidesPerView:1,
      },
      720:{
        slidesPerView:2,
      },
      950:{
        slidesPerView:3,
      },
    },
  });
  var swiper2 = new Swiper(".categoriesH", {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
  
    autoplay:{
        
        delay:0
    },
    speed:8000,
    preventInteractionOnTransition: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });

  var swiper3 = new Swiper(".main_tittle_content", {
    slidersPerView: 1,
    spaceBetween: 30,
    loop: true,
    autoplay:{
        
      delay:5000
     
  },
    fadeEffect:{crossFade:true},
    virtualTranslate:true,
    effect:"fade",
   
    
    
    
  });

  var swiper4 = new Swiper(".news", {
    slidersPerView: 1,
    spaceBetween: 30,
    loop: true,

    breakpoints:{
      0:{
        slidesPerView:1,
      },
      720:{
        slidesPerView:1,
      },
      993:{
        slidesPerView:4,
      },
    },
    
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
  window.onload=function(){
   
      
      
     
  
  }
  var stranica=window.location.pathname.split("/").pop();

 function AjaxCallBack(fajl,tip){
  var podaci;
    $.ajax({
          async:false,
          url:"../models/"+fajl+'.php',
          type:"GET",
          dataType:tip,
          success:function(data){
           
            podaci=data;
           },
          error:function(error){
            console.log(error);
          }
        
    })
    return podaci;
    
 }
 function AjaxCallBackNovosti(fajl,tip,start,limit,kategorija){
  var podaci;
    $.ajax({
          async:false,
          url:"../models/"+fajl+'.php?start='+start+'&limit='+limit+'&category='+kategorija,
          type:"GET",
          dataType:tip,
          success:function(data){
           
            podaci=data;
           },
          error:function(error){
            console.log(error);
          }
        
    })
    return podaci;
    
 }
 function AjaxForward(fajl,tip,podaciZaSlanje){
  $.ajax({
    async:false,
    url:"../models/"+fajl+'.php',
    type:"POST",
    data:podaciZaSlanje,
    dataType:tip,

    success:function(response){
     
      console.log(response);
      
     },
    error:function(error){
     
      console.log(error);
    }
 
})
 }
  var modal=document.querySelectorAll('.location');

   var map_wrapp=document.getElementById('modal_map');
   var map=document.getElementById('map')
  
   var bg_map=document.getElementById('bg_map');
   //Kod za locations.php
   if(stranica == 'locations.php'){

    var mapTilers=L.map('mapTiler').setView([44.81809,20.46272],1);
    var lokacije=AjaxCallBack('lokacijeAjax',"JSON");
    var radno_vreme=AjaxCallBack('radnoVremeAjax',"JSON");
    function PopUp(id,niz){
    
    
      map_wrapp.classList.remove('d-none');
      map_wrapp.classList.add('d-flex');
      mapTilers.invalidateSize()
     
      
      mapTilers.flyTo([niz[id][0],[niz[id][1]]],17,{
        duration:0.5
      });
    }
    function PopOut(){
    
      map_wrapp.classList.remove('d-flex');
      map_wrapp.classList.add('d-none');
      
  
    }
    
    var coords=[];
  
    for(var y=0; y < lokacije[0].length;y++){
    
      coords[y]=Array(lokacije[0][y]['latituda'],lokacije[0][y]['longituda']);
    }
  
    
     $(map).click(PopOut);
     for(var i=0; i < modal.length; i++) {
      
      
      modal[i].addEventListener('click',function(){
        
        var ids= ''+$(this).attr('id').match(/[0-9]/)-1;
      
        PopUp(ids,coords)
      });
     }
     
     
     
     L.tileLayer('https://api.maptiler.com/maps/streets-v2/{z}/{x}/{y}.png?key=k5vWKT6tHIQDsKUFUVMk',{
      attribution:'<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>',
      center:[
        44.81714,
        20.46374
      ],
      maxZoom:80,
      tileSize:512,
      zoomOffset:-1,
  }).addTo(mapTilers);
  
  var cene=['800','1800','1300','1440','1500'];
  mapTilers.setZoom(17)
  var l=coords.length;
  
  
  var locations=document.getElementsByClassName('lokacijaJS');
  
 
  function OtvorenoZatvoreno(nizL,nizRV){
    var trenutnoVreme=new Date().toLocaleTimeString('en-US',{hour12:false});
    
    for(var i=0;i < nizL.length;i++){
  
      if(nizL[0][i]['id_radno_vreme']==[nizRV[0][i]['id_radno_vreme']]){
        if(trenutnoVreme > nizRV[0][i]['pocetak'] && trenutnoVreme < nizRV[0][i]['kraj']){
          return ` <span class="text-success">Otvoreno</span>`
        }
        else{
          return ` <span class="text-danger">Zatvoreno</span>`
        }
        
      }
    }
     
  }
  for(let i = 0;i <l;i++){
    
    var marker = L.marker(coords[i]).addTo(mapTilers);
    var toollip=L.tooltip({
      permanent:true
    }).setContent(
      `<div class="d-flex flex-column justify-content-center align-items-center">
    
    <h3 class="tooltipStyle">${lokacije[0][i]['naziv_ulice']+' '+lokacije[0][i]['broj_ulice']}</h3>
    <a href='#' class="text-decoration-none">${lokacije[0][i]['telefon']}</a>
    <b>Radno vreme</b>`+vratiRVreme(lokacije,radno_vreme)+``+OtvorenoZatvoreno(lokacije,radno_vreme)+`
      
   
    </div>`);
   
    marker.bindTooltip(toollip)
   
  
  
    locations[i].addEventListener("click",()=>{
      mapTilers.flyTo(coords[i], 17,{
        animate:true,
        duration:0.5
      });
    })
  }
  var dugmeIzadjiIzMape=document.getElementById('mapaIzlaz');
  dugmeIzadjiIzMape.addEventListener('click',function(){
    PopOut();
  })
   }
 
   //kod za ukuse 

   if(stranica == 'flavors.php' ){

  
   
   

    
    
    
    
    var strela = document.getElementById('arrow');
    var lista=document.getElementById('loc_unselected');
    var klikLokacija=document.getElementsByClassName('lokacija');

    strela.addEventListener('click',function(){
        lista.classList.toggle('d-flex');
        if(strela.style.transform=='rotate(45deg)' || strela.style.transform== ''){
          strela.style.transform='rotate(225deg)';
          
        }
        else{
          strela.style.transform='rotate(45deg)';
          
          
        }
        
    })
      for(var l=0;l< klikLokacija.length;l++){
        $(klikLokacija[l]).on('click',function(){
          //promena selektovane lokacije
          var mesto = $(this).attr('data-lokacija');
          var adresa = $(this).attr('data-adresa');
          var idLok=$(this).attr('data-idLok');
          document.getElementById('Town').innerHTML=mesto;
          document.getElementById('address').innerHTML=adresa;
          //promena sladoleda
          var podaciZa={
            id:idLok,
            adresaLok:adresa
          }
          
          AjaxForward('sladProdavnice','JSON',podaciZa);
 
         var sladoledi= AjaxCallBack('sladProdavnice','JSON');
        
         ispisiSladolede(sladoledi);
         $('.kategorije').removeClass('activeCategory');
         $("[data-category|='SVI SLADOLEDI']").addClass('activeCategory');
         
        })
        
      }
      window.onload=function(){
        var sladZaIspis=AjaxCallBack('sladolediAjax','JSON');
        ispisiSladolede(sladZaIspis);
     
  
   
   
    
    var kategorije = document.querySelectorAll('.kategorije');
    
    for(var i = 0; i < kategorije.length;i ++){
      kategorije[i].addEventListener('click',function(){
        var klikKategorija=$(this).attr('data-category');
        filtriraj(klikKategorija,sladZaIspis);
        $('.kategorije').removeClass('activeCategory');
        $(this).addClass('activeCategory');
        
       
      })

    }

    novSlad(sladZaIspis);
        document.getElementById('Town').innerHTML=$(klikLokacija[1]).attr('data-lokacija');
        document.getElementById('address').innerHTML=$(klikLokacija[1]).attr('data-adresa');
      }
     
     
      
       
   }
      //funkcije za novosti
      if(stranica =='news_stranica.php'){
        var brStr=AjaxCallBack('brojStranicaClanakaAjax','JSON');
        var brCl=AjaxCallBack('brojClanakaAjax','JSON');
      }
  
   function ispisKategorije(nizKat){
    var ispis='';
    
    for(var i=0; i <nizKat[0].length; i++){
      
      ispis+=`<div class="swiper-slide">
      <button class="categorie_button" data-id='${nizKat[0][i]['id_kategorija_clanka']}'>${nizKat[0][i]['naziv']}</button>
      </div>`;
    }
    document.getElementById('categoriesArticle').innerHTML=ispis;
   }

   function ispisClanaka(nizClanaka){
    var ispis='';
    var ispis2='';
    for(var i=0; i <nizClanaka[0].length; i++){
    
      ispis+=`<a href="news_article.php?id=${nizClanaka[0][i]['id_clanak']}" class="text-decoration-none text-black d-flex justify-content-center justify-content-sm-start">
      <Div class="news_stories m-md-5  d-flex ">
         <Div class="news_image">
                 <img src="../assets/img/${nizClanaka[0][i]['slika']}">
 
         </Div>
        
         <div class="news_info mx-sm-4 d-flex flex-column justify-content-start">
             <h2>${nizClanaka[0][i]['naslov']}</h2>
             <span>${nizClanaka[0][i]['datum'].slice(0,nizClanaka[0][i]['datum'].lastIndexOf(':'))}</span>
             <p>${nizClanaka[0][i]['tekst'].substring(0,nizClanaka[0][i]['tekst'].indexOf('.')+1)}..</p>
         </div>
         
      </Div>
      </a>`;
      
    }
  
    
      
     for(var b=0;b<brStr;b++){
      ispis2+=` <span class="Bungee text-braon paginacijaDugme" data-str='${b*3}'>${b+1}</span>`;
     }
   document.getElementById('Novosti').innerHTML=ispis;
   document.getElementById('Paginacija').innerHTML=ispis2;
     var dugmad= document.getElementsByClassName('paginacijaDugme')
     for(var d=0;d< dugmad.length;d++){
      dugmad[d].addEventListener('click',function(){
        novaStr($(this).attr('data-str'));
      })
     }
   }
function novaStr(start){
  var obj={
    startStr:start
  }
  AjaxForward('ClanciAjax','JSON',obj)
  var niz=AjaxCallBackNovosti('ClanciAjax','JSON',start,3,4);
  console.log(niz);
 ispisClanaka(niz);
}
   function filtrirajNovosti(klikKat){
          var noviNiz=[[]];
          var nizClanaka=AjaxCallBackNovosti('clanciAjax','JSON',0,3,klikKat);
          for(var n=0;n<nizClanaka[0].length;n++){
            if(nizClanaka[0][n]['id_kategorija']==klikKat){
              noviNiz[0].push(nizClanaka[0][n]);
            }
          }
          if(klikKat == 4){
              noviNiz=AjaxCallBackNovosti('clanciAjax','JSON',0,3,4);
          }
          ispisClanaka(noviNiz);

      
   }
 
   //kod za novosti
   if(stranica == 'news_stranica.php'){
     var kategorijeArtikla= AjaxCallBack('kategorijeClanciAjax','JSON');
     var clanci=AjaxCallBackNovosti('clanciAjax','JSON',0,3,4);
      var categories=document.getElementById('categoriesArticle');
      window.onload=function(){
        
        ispisKategorije(kategorijeArtikla);
        ispisClanaka(clanci);
        var KategorijeButtons= document.getElementsByClassName('categorie_button');
          for(var i =0;i<KategorijeButtons.length;i++){
           
            $(KategorijeButtons[i]).on('click',function(){
            var kliknutaKat=$(this).attr('data-id');
                  filtrirajNovosti(kliknutaKat);
            })
          }
          
    
   }
  }


  // kod za pitanja
$(document).ready(function () {
    
      
       
        $('#myform').on('submit', function(e) {
         
          e.preventDefault();
          var ddl=document.getElementsByClassName('pitanja_ddl')
          var obj={
            odgovor1:ddl[0].options[ddl[0].selectedIndex].getAttribute('dataidodg'),
            odgovor2:ddl[1].options[ddl[1].selectedIndex].getAttribute('dataidodg'),
            odgovor3:ddl[2].options[ddl[2].selectedIndex].getAttribute('dataidodg'),
          }
       
        $.ajax({
            url : 'models/unosOdgovora.php',
            type: "POST",
            data: obj,
            success: function (data) {
                
                  $("#form_output").html(data);
                  setTimeout(function(){$('#form_output').fadeOut() },5000)
          
            },
            error: function (jXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });
});



    







//ovde krece kod za formu naruzbine

var praznaPolja;
var regexUlica=/[A-Z][a-z]{3,}$/;
var regexUlicaBroj=/[0-9]{1,}$/;
var regexSpratInterfon=/(^[0-9]{1,},[0-9]{1,}$){1}/;
var podaciZaLS={};
function PorudzbinaFormaAdrese(kliknutoDugmeTipa,kliknutoDugmeLokacije,nizAdresa,nizVremena){
    var gradovi= AjaxCallBack('GradoviAjax','JSON');
    var ispis="";
    var lokacija=$(kliknutoDugmeLokacije).attr('data-city');
    var idGrad;
    for(var y=0;y <gradovi[0].length;y++){
      if(gradovi[0][y]['naziv']==lokacija){
          idGrad=gradovi[0][y]['id_grad'];
      }
    }
    podaciZaLS['id_grad']=idGrad;
    podaciZaLS['ukupnaCena']=0;
    podaciZaLS['id_korisnik']=document.getElementById('user').getAttribute('data-user');
    var id_korisnika=document.getElementById('user').getAttribute('data-user');
    var korisnik=dohvatiKorisnika(id_korisnika);
    
    podaciZaLS['Ime']=korisnik['Ime'];
    podaciZaLS['Prezime']=korisnik['Prezime'];
    podaciZaLS['Email']=korisnik['Email'];
    podaciZaLS['Telefon']=korisnik['Broj'];
    if($(kliknutoDugmeTipa).attr('data-ot')=="preuzimanje" && $(kliknutoDugmeLokacije).attr('data-city') == 'Beograd'){
      for(var y=0;y <gradovi[0].length;y++){
      for(var i=0;i < nizAdresa[0].length;i++){
        if(nizAdresa[0][i]['id_grad'] == gradovi[0][y]['id_grad'] && gradovi[0][y]['naziv']=="Beograd"){

      
        ispis+=`<div class="adresses_buttons d-flex flex-column justify-content-center align-items-center poluvidljivost" data-id="${i}" data-lok="${nizAdresa[0][i]['id_lokacija']}" data-gradID=${nizAdresa[0][i]['id_grad']} data-adresa="${nizAdresa[0][i]['naziv_ulice']}">
        <div class="address_name">
                <button class="address_button">${nizAdresa[0][i]['naziv_ulice']+' '+nizAdresa[0][i]['broj_ulice']}</button>
        </div>
        <div class="working_time">
                <p>`+vratiRVreme(nizAdresa,nizVremena)+`</p>
                
        </div>
        <div class="check">
        <em class="unchecked">✔</em>
        </div>
  </div>`;
}
      }
    }
    }
    if($(kliknutoDugmeTipa).attr('data-ot')=="preuzimanje" && $(kliknutoDugmeLokacije).attr('data-city') == 'Novi Sad'){
      ispis='';

      for(var y=0;y <gradovi[0].length;y++){
      for(var i=0;i < nizAdresa[0].length;i++){
        if(nizAdresa[0][i]['id_grad'] == gradovi[0][y]['id_grad'] && gradovi[0][y]['naziv']=="Novi Sad"){
           
      
        ispis+=`<div class="adresses_buttons d-flex flex-column justify-content-center align-items-center poluvidljivost" data-id="${i}" data-lok="${nizAdresa[0][i]['id_lokacija']}">
        <div class="address_name">
                <button class="address_button" data-locID="">${nizAdresa[0][i]['naziv_ulice']+' '+nizAdresa[0][i]['broj_ulice']}</button>
        </div>
        <div class="working_time">
                <p>`+vratiRVreme(nizAdresa,nizVremena)+`</p>
                
        </div>
        <div class="check">
        <em class="unchecked">✔</em>
        </div>
  </div>`;
}
      }
    }
    }
    if($(kliknutoDugmeTipa).attr('data-ot')=="dostava"){
      podaciZaLS['id_lokacija']=null;
      ispisForme='';
      ispisForme+=`<form class='order_form font-Linotte'>
      <div class='d-flex flex-column justify-content-center align-items-center m-2 w-100'>
          <input type="text" name='Ulica' class="input_order" placeholder="Ulica" id='UlicaOrder'>
          <p id="porukaErrorUlica" class="dostavaError"></p>
          </div>
          <div class='d-flex flex-column justify-content-center align-items-center m-2   w-100'>
          <input type="text" name='BrojUlice' class="input_order" placeholder="Broj ulice" id='UlicaBrojOrder'>
          <p id="porukaErrorBrojUlice" class="dostavaError"></p>
          </div>
          <div class='d-flex flex-column justify-content-center align-items-center m-2  w-100'>
          <input type="text" name='SpratInterfon' class="input_order" placeholder="Sprat,interfon" id='SpratInterfonOrder'>
          <p id="porukaErrorSpratInterfon" class="dostavaError"></p>
          </div>
      </form>`
    }
    
    if(document.getElementsByClassName('checked').length == 0 ){
      document.getElementById("order_step_2").innerHTML=ispis;
      
    }
    if( $(kliknutoDugmeTipa).attr('data-ot') =='dostava'){
      document.getElementById("order_step_2").innerHTML=ispisForme;
      var poljaHTML=$('.input_order');
      
      var polja=Array.from(poljaHTML);
     
      praznaPolja=polja;
      
      var inputUlica=document.getElementById('UlicaOrder');
      var inputUlicaBroj=document.getElementById('UlicaBrojOrder');
      var inputSpratInterfon=document.getElementById('SpratInterfonOrder');

      inputUlica.addEventListener('blur',function(){
        
       if(regexUlica.test(inputUlica.value.trim()) ){
        var indexZaBrisanje=praznaPolja.lastIndexOf($(this)[0]);
        
        if(indexZaBrisanje != -1){
          praznaPolja.splice(indexZaBrisanje,1);
        }
        document.getElementById('porukaErrorUlica').innerHTML='';
        podaciZaLS['ulica']=$(this).val();
       }
       else{
        if(!praznaPolja.includes($(this)[0])){
          praznaPolja.push($(this)[0]);
        }
        document.getElementById('porukaErrorUlica').innerHTML='Ime ulice ne sme sadrzati broj';
       }
       
      })
      inputUlicaBroj.addEventListener('blur',function(){

        if(regexUlicaBroj.test(inputUlicaBroj.value) ){
          var indexZaBrisanje=praznaPolja.lastIndexOf($(this)[0]);
          
        
          if(indexZaBrisanje != -1){
            praznaPolja.splice(indexZaBrisanje,1);
          }
          document.getElementById('porukaErrorBrojUlice').innerHTML='';
          podaciZaLS['broj']=$(this).val();
      }
      else{
        if(!praznaPolja.includes($(this)[0])){
          praznaPolja.push($(this)[0]);
          document.getElementById('')
        }
        document.getElementById('porukaErrorBrojUlice').innerHTML='Morate uneti ispravan broj ulice';
      }

      })
      inputSpratInterfon.addEventListener('blur',function(){
    
        if(regexSpratInterfon.test(inputSpratInterfon.value) ){
          var indexZaBrisanje=praznaPolja.lastIndexOf($(this)[0]);
     
          
          
          if(indexZaBrisanje != -1){
            praznaPolja.splice(indexZaBrisanje,1);
          }
          
          document.getElementById('porukaErrorSpratInterfon').innerHTML='';
          var vrednost=$(this).val();
          podaciZaLS['sprat']=vrednost.substring(0,vrednost.indexOf(","));
          podaciZaLS['interfon']=vrednost.split(',').pop();
      }
      else{
   if(!praznaPolja.includes($(this)[0])){
          praznaPolja.push($(this)[0]);//porukaErrorUlica
         
        }
        document.getElementById('porukaErrorSpratInterfon').innerHTML='Morate uneti sprat i br. interfona';
      }
    
      })
    }
   


  
   
     
    
    
   
}


function cekirajAdresu(kliknutaAdresa,ostaleAdrese){
 
   if($(kliknutaAdresa).children('.check').children('').hasClass('unchecked')){
    
    for(var z=0;z < ostaleAdrese.length;z++){
      $(ostaleAdrese[z]).children('.check').children('.checked').removeClass('checked');
      $(ostaleAdrese[z]).children('.check').children().addClass('unchecked');
      $(ostaleAdrese[z]).addClass('poluvidljivost');
    }
    $(kliknutaAdresa).children('.check').children('.unchecked').addClass('checked');
    
    $(kliknutaAdresa).children('.check').children('.unchecked').removeClass('unchecked');
    $(kliknutaAdresa).removeClass('poluvidljivost');
   }
   
   dohvatiIdLok(kliknutaAdresa);
}
function dohvatiIdLok(SelektovanaLokacija){
  
    var lokacije=AjaxCallBack('lokacijeAjax','JSON');
    var adresa={};
    for(var l = 0; l < lokacije[0].length;l++){
            if(lokacije[0][l]['id_lokacija']==SelektovanaLokacija.attr('data-lok')){
              adresa=lokacije[0][l];
            }
    }
    localStorage.setItem('adresa',JSON.stringify(adresa));
   
       podaciZaLS['id_lokacija']=adresa['id_lokacija'];
    return adresa;
}


//stranica 
if(stranica == "order.php"){
  $(window).on('load',function(){
   
    $('#overlay').fadeOut();
 });
  function ispisiOstatakDana(){
        const datum=new Date();
        const dan=datum.getDay();
        const sat=datum.getHours();
      
        var ispis="";
        switch(dan){
          case 0: ispis=`<option value="1">Ponedeljak</option><option value="2">Utorak</option><option value="3">Sreda</option><option value="4">Cetvrtak</option><option value='5'>Petak</option><option value="6">Subota</option><option value="0">Nedelja</option>`;
          case 1: ispis=`<option value="1">Ponedeljak</option><option value="2">Utorak</option><option value="3">Sreda</option><option value="4">Cetvrtak</option><option value='5'>Petak</option><option value="6">Subota</option><option value="0">Nedelja</option>`;
          break
          case 2: ispis=`<option value="2">Utorak</option><option value="3">Sreda</option><option value="4">Cetvrtak</option><option value='5'>Petak</option><option value="6">Subota</option><option value="0">Nedelja</option>`;
          break
          case 3: ispis=`<option value="3">Sreda</option><option value="4">Cetvrtak</option><option value='5'>Petak</option><option value="6">Subota</option><option value="0">Nedelja</option>`;
          break
          case 4: ispis=`<option value="4">Cetvrtak</option><option value='5'>Petak</option><option value="6">Subota</option><option value="0">Nedelja</option>`;
          break
          case 5: ispis=`<option value='5'>Petak</option><option value="6">Subota</option><option value="0">Nedelja</option>`;
          break
          case 6: ispis=`<option value="6">Subota</option><option value="0">Nedelja</option>`;
          break
        }
      return ispis;
  }
  function ispisiMinimumSati(izabranDan){
  
    var ispis=`<option value='0'>Izaberite vreme</option>`;
    var pocetak;
    var limit;
    var trenutniDan=new Date().getDay();
    var trenutnoSati=new Date().getHours();

    if(trenutniDan == izabranDan){
      if(new Date().getHours() < 10){
        pocetak=10*60;
      }
      else{
       if(new Date().getMinutes() < 30){
        pocetak=new Date().getHours()*60+30;
       }
      else{
        pocetak=new Date().getHours()*60+60;
      }
        


      }
      
       limit = 22*60;
    }
    else{
       pocetak=10*60;
       limit=22*60;
    }
    console.log(izabranDan);
    var sat=new Date().getHours();



    var hours, minutes, ampm;
    for(var i = pocetak; i <= limit; i += 30){
        hours = Math.floor(i / 60);
        minutes = i % 60;
        if (minutes < 10){
            minutes = '0' + minutes; // adding leading zero
        }
        ampm = hours % 24 < 12 ? 'AM' : 'PM';
        hours = hours % 12;
        if (hours === 0){
            hours = 12;
        }
      if(izabranDan !='Izaberite dan'){
        ispis+=`<option value='${i}'>${hours}:${minutes}:${ampm}</option>`
      }
     else{

      ispis='<option value="Izaberite vreme">Izaberite vreme</option>';
     }
        
    }
 
  document.getElementById('vreme').innerHTML=ispis;
  
}
  function ispisiNarudzbinu(){
    var id_korisnika=document.getElementById('user').getAttribute('data-user');
    var korisnik=dohvatiKorisnika(id_korisnika);
  console.log(korisnik);
    var podaciNarudzbine=JSON.parse(localStorage.getItem('orderInfo'));
    var adresa=JSON.parse(localStorage.getItem('adresa'));
    var gradovi=AjaxCallBack('GradoviAjax','JSON');
    for(var g=0; g< gradovi[0].length;g++){
          if(gradovi[0][g]['id_grad']==podaciNarudzbine['id_grad']){
            var grad=gradovi[0][g];
          }
    }
    function ispisiAdresu(){
      var ispis="";
      if(podaciNarudzbine['tip_Porudzbine']==1){
          ispis=`${podaciNarudzbine['ulica']} ${podaciNarudzbine['broj']}`;
      }
      if(podaciNarudzbine['tip_Porudzbine']==2){
       
        
        
            ispis=`${adresa['naziv_ulice']} ${adresa['broj_ulice']}`;
          
    

    }
      return ispis;
    }
    function ispisiTipPorudzbine(){
      ispis="";
      if(podaciNarudzbine['tip_Porudzbine']==1){
        ispis="dostava"
      }
      if(podaciNarudzbine['tip_Porudzbine']==2){
        ispis="preuzimanje"
      }
      return ispis;
    }
    var ispis=`<div class='order_info'>
            <div class='d-flex flex-column flex-md-row justify-content-center align-items-start'>
                  <div class="order_location_info d-flex flex-column justify-content-center align-items-center m-3">
                    <img src="../assets/img/ice_cream_cart.png" width="110" height="100">
                    <div class="d-flex flex-column justify-content-center align-items-center ">
                        <h4 class='font-Linotte order_type'>`+ispisiTipPorudzbine()+`</h4>
                        <span class='Bungee order_town'>${grad['naziv']}</span>
                        <span class='font-Linotte order_street'>`+ispisiAdresu()+`</span>
                        <hr class='w-100'>
                    </div>
                  </div>
                  <div class="order_items_form m-3" ><div id='order_items'>`
                  
                    +ispisiKorpu2()+
                `</div>
                <div class="orderFinal_form w-100">
                      <form class="d-flex flex-column -justify-content-center align-items-center ">
                      <div class="d-flex flex-md-row flex-column justify-content-center align-items-center">
                      <label>Izaberite</label>
                      <select class='inputFinaleForm' id="dan" name='dan'>
                      <option>Izaberite dan</option>
                      ${ispisiOstatakDana()}
                      </select>
                      <select class='inputFinaleForm' id='vreme' name='vreme'>
                      <option>Izaberite vreme</option>
                    
                      </select>
                  
                      </div>
                      <p class="greska" id="danGreska"></p>
                      <p class="greska" id="VremeGreska"></p>
                      <input type="text" name="ImePrezime" class='inputFinaleForm' placeholder="Ime i prezime" value='${korisnik['Ime'] } ${korisnik['Prezime']}' id='ImePrezimePorudzbina'>
                      <p class="greska" id="FinalImePrezimeGreska"></p>
                      <input type="email" name="email" class='inputFinaleForm' value="${korisnik['Email'] }" placeholder="Email"> 
                      <p class="greska" id="FinalEmailGreska"></p>
                      <input type="text" name="Telefon" class='inputFinaleForm' value="${korisnik['Broj'] }"  placeholder="Telefon">
                      <p class="greska" id="FinalTelefonGreska"></p>
                      <select class="inputFinaleForm" name="NacinPlacanja">
                     
                      <option value="0">Nacin placanja</option>
                        <option value="1">Karticom</option>
                        <option value="2">pouzećem</option>
                      </select>
                      <p class="greska" id="FinalPlacanjeGreska"></p>
                      <textarea class="inputFinaleForm" placeholder="Napomena" name='Napomena' rows='7'></textarea>
                     <div class="dugme"><button  id="kreirajPorudzbinu" type="button">Završi porudžbinu</button></div> 
                      </form >
                </div>
                  </div>
                  
            </div>
    </div>`; //action="../models/napraviNarudzbinu.php" method="POST"
    document.getElementById('order_body').innerHTML=ispis;
    var kolicinaInput=document.getElementsByClassName('item_count');

    for(var k=0;k<kolicinaInput.length;k++){
    
     $(kolicinaInput[k]).children('#plus').on('click',function(){
      var korpa2=JSON.parse(localStorage.getItem('korpa2'));
      povecajKol2($(this).parent().attr('data-nark'));

     
       })
     $(kolicinaInput[k]).children('#minus').on('click',function(){
      smanjiKol2($(this).parent().attr('data-nark'));
      
     })
     }
     var dugmeObrisi=document.getElementsByClassName('delete');
  
     for(var d=0;d<dugmeObrisi.length;d++){
      $(dugmeObrisi[d]).on('click',function(){
        izbrisi2($(this).attr('data-del'));
      })
     }

    var DanDDL=document.getElementById('dan');
    DanDDL.addEventListener('change',function(){
      ispisiMinimumSati(DanDDL.value);
    })
    var regexTelefon=/[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}/
    var regexEmail=/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/
    var regexImePrezime=/^[A-Z][a-z]{2,}\s[A-Z][a-z]{2,}$/
    var finalnaForma=document.getElementsByClassName('inputFinaleForm');
    var finalnaFormaLS=JSON.parse(localStorage.getItem('orderInfo'));
    var novOrderInfo={};
   for(var f=0; f< finalnaForma.length;f++){
     
        finalnaForma[f].addEventListener('change',function(){
          console.log();
          if($(this).attr('name') == 'ImePrezime' && regexImePrezime.test($(this).val())){
            var fullIme=$(this).val().split(' ');
            var ime=fullIme[0];
            var prezime=fullIme[fullIme.length-1];
            novOrderInfo['Email']=finalnaFormaLS['Email'];
            novOrderInfo['Ime']=ime;
            novOrderInfo['Prezime']=prezime;
            novOrderInfo['Telefon']=finalnaFormaLS['Telefon'];
            novOrderInfo['broj']=finalnaFormaLS['broj'];
            novOrderInfo['id_grad']=finalnaFormaLS['id_grad'];
            novOrderInfo['id_korisnik']=finalnaFormaLS['id_korisnik'];
            novOrderInfo['interfon']=finalnaFormaLS['interfon'];
            novOrderInfo['sprat']=finalnaFormaLS['sprat'];
            novOrderInfo['tip_Porudzbine']=finalnaFormaLS['tip_Porudzbine'];
            novOrderInfo['ulica']=finalnaFormaLS['ulica'];
            novOrderInfo['id_lokacija']=finalnaFormaLS['id_lokacija'];
            novOrderInfo['ukupnaCena']=finalnaFormaLS['ukupnaCena'];
            localStorage.setItem('orderInfo',JSON.stringify(novOrderInfo));
            finalnaFormaLS=JSON.parse(localStorage.getItem('orderInfo'));
            
          }
          
          if($(this).attr('name') == 'email' && regexEmail.test($(this).val())){
            
            var NovEmail=$(this).val();
            novOrderInfo['Email']=NovEmail;
            novOrderInfo['Ime']=finalnaFormaLS['Ime'];
            novOrderInfo['Prezime']=finalnaFormaLS['Prezime'];
            novOrderInfo['Telefon']=finalnaFormaLS['Telefon'];
            novOrderInfo['broj']=finalnaFormaLS['broj'];
            novOrderInfo['id_grad']=finalnaFormaLS['id_grad'];
            novOrderInfo['id_korisnik']=finalnaFormaLS['id_korisnik'];
            novOrderInfo['interfon']=finalnaFormaLS['interfon'];
            novOrderInfo['sprat']=finalnaFormaLS['sprat'];
            novOrderInfo['tip_Porudzbine']=finalnaFormaLS['tip_Porudzbine'];
            novOrderInfo['ulica']=finalnaFormaLS['ulica'];
            novOrderInfo['id_lokacija']=finalnaFormaLS['id_lokacija'];
            novOrderInfo['ukupnaCena']=finalnaFormaLS['ukupnaCena'];
            localStorage.setItem('orderInfo',JSON.stringify(novOrderInfo));
            finalnaFormaLS=JSON.parse(localStorage.getItem('orderInfo'));
            
          }
        
          if($(this).attr('name') == 'Telefon' && regexTelefon.test($(this).val())){
            var NovTelefon=$(this).val();
            novOrderInfo['Email']=finalnaFormaLS['Email'];
            novOrderInfo['Ime']=finalnaFormaLS['Ime'];
            novOrderInfo['Prezime']=finalnaFormaLS['Prezime'];
            novOrderInfo['Telefon']=NovTelefon;
            novOrderInfo['broj']=finalnaFormaLS['broj'];
            novOrderInfo['id_grad']=finalnaFormaLS['id_grad'];
            novOrderInfo['id_korisnik']=finalnaFormaLS['id_korisnik'];
            novOrderInfo['interfon']=finalnaFormaLS['interfon'];
            novOrderInfo['sprat']=finalnaFormaLS['sprat'];
            novOrderInfo['tip_Porudzbine']=finalnaFormaLS['tip_Porudzbine'];
            novOrderInfo['ulica']=finalnaFormaLS['ulica'];
            novOrderInfo['id_lokacija']=finalnaFormaLS['id_lokacija'];
            novOrderInfo['ukupnaCena']=finalnaFormaLS['ukupnaCena'];
            localStorage.setItem('orderInfo',JSON.stringify(novOrderInfo));
            finalnaFormaLS=JSON.parse(localStorage.getItem('orderInfo'));
         
          }
    
          if($(this).attr('name') == 'NacinPlacanja' && $(this).val() != 0 ){
       
            var nacin_Placanja=$(this).val();
            console.log(nacin_Placanja);
            novOrderInfo['Email']=finalnaFormaLS['Email'];
            novOrderInfo['Ime']=finalnaFormaLS['Ime'];
            novOrderInfo['Prezime']=finalnaFormaLS['Prezime'];
            novOrderInfo['Telefon']=finalnaFormaLS['Telefon'];
            novOrderInfo['broj']=finalnaFormaLS['broj'];
            novOrderInfo['id_grad']=finalnaFormaLS['id_grad'];
            novOrderInfo['id_korisnik']=finalnaFormaLS['id_korisnik'];
            novOrderInfo['interfon']=finalnaFormaLS['interfon'];
            novOrderInfo['sprat']=finalnaFormaLS['sprat'];
            novOrderInfo['tip_Porudzbine']=finalnaFormaLS['tip_Porudzbine'];
            novOrderInfo['ulica']=finalnaFormaLS['ulica'];
            novOrderInfo['nacin_Placanja']=nacin_Placanja;
            novOrderInfo['id_lokacija']=finalnaFormaLS['id_lokacija'];
            novOrderInfo['ukupnaCena']=finalnaFormaLS['ukupnaCena'];
            localStorage.setItem('orderInfo',JSON.stringify(novOrderInfo));
            finalnaFormaLS=JSON.parse(localStorage.getItem('orderInfo'));
           
          }
        
          if($(this).attr('name') == 'NacinPlacanja'  ){
            var nacin_Placanja=$(this).val();
            novOrderInfo['Email']=finalnaFormaLS['Email'];
            novOrderInfo['Ime']=finalnaFormaLS['Ime'];
            novOrderInfo['Prezime']=finalnaFormaLS['Prezime'];
            novOrderInfo['Telefon']=finalnaFormaLS['Telefon'];
            novOrderInfo['broj']=finalnaFormaLS['broj'];
            novOrderInfo['id_grad']=finalnaFormaLS['id_grad'];
            novOrderInfo['id_korisnik']=finalnaFormaLS['id_korisnik'];
            novOrderInfo['interfon']=finalnaFormaLS['interfon'];
            novOrderInfo['sprat']=finalnaFormaLS['sprat'];
            novOrderInfo['tip_Porudzbine']=finalnaFormaLS['tip_Porudzbine'];
            novOrderInfo['ulica']=finalnaFormaLS['ulica'];
            if(nacin_Placanja !=0){

        
            novOrderInfo['nacin_Placanja']=nacin_Placanja;
            document.getElementById('FinalPlacanjeGreska').innerHTML='';
          }
          else{
            novOrderInfo['nacin_Placanja']=0;
            document.getElementById('FinalPlacanjeGreska').innerHTML='Morate izabrati način plaćanja';
          }
            novOrderInfo['id_lokacija']=finalnaFormaLS['id_lokacija'];
            novOrderInfo['ukupnaCena']=finalnaFormaLS['ukupnaCena'];
            localStorage.setItem('orderInfo',JSON.stringify(novOrderInfo));
            finalnaFormaLS=JSON.parse(localStorage.getItem('orderInfo'));
            
          }
       
          if($(this).attr('name') == 'Napomena'){
            var napomena=$(this).val();
            novOrderInfo['Email']=finalnaFormaLS['Email'];
            novOrderInfo['Ime']=finalnaFormaLS['Ime'];
            novOrderInfo['Prezime']=finalnaFormaLS['Prezime'];
            novOrderInfo['Telefon']=finalnaFormaLS['Telefon'];
            novOrderInfo['broj']=finalnaFormaLS['broj'];
            novOrderInfo['id_grad']=finalnaFormaLS['id_grad'];
            novOrderInfo['id_korisnik']=finalnaFormaLS['id_korisnik'];
            novOrderInfo['interfon']=finalnaFormaLS['interfon'];
            novOrderInfo['sprat']=finalnaFormaLS['sprat'];
            novOrderInfo['tip_Porudzbine']=finalnaFormaLS['tip_Porudzbine'];
            novOrderInfo['ulica']=finalnaFormaLS['ulica'];
            novOrderInfo['nacin_Placanja']=finalnaFormaLS['nacin_Placanja'];
            novOrderInfo['napomena']=napomena;
            novOrderInfo['id_lokacija']=finalnaFormaLS['id_lokacija'];
            novOrderInfo['ukupnaCena']=finalnaFormaLS['ukupnaCena'];
            localStorage.setItem('orderInfo',JSON.stringify(novOrderInfo));
            finalnaFormaLS=JSON.parse(localStorage.getItem('orderInfo'));
          
          }
        
          if($(this).attr('name') == 'dan'){
            var dan=$(this).val();
            console.log(dan);
            novOrderInfo['Email']=finalnaFormaLS['Email'];
            novOrderInfo['Ime']=finalnaFormaLS['Ime'];
            novOrderInfo['Prezime']=finalnaFormaLS['Prezime'];
            novOrderInfo['Telefon']=finalnaFormaLS['Telefon'];
            novOrderInfo['broj']=finalnaFormaLS['broj'];
            novOrderInfo['id_grad']=finalnaFormaLS['id_grad'];
            novOrderInfo['id_korisnik']=finalnaFormaLS['id_korisnik'];
            novOrderInfo['interfon']=finalnaFormaLS['interfon'];
            novOrderInfo['sprat']=finalnaFormaLS['sprat'];
            novOrderInfo['tip_Porudzbine']=finalnaFormaLS['tip_Porudzbine'];
            novOrderInfo['ulica']=finalnaFormaLS['ulica'];
            novOrderInfo['nacin_Placanja']=finalnaFormaLS['nacin_Placanja'];
            novOrderInfo['napomena']=finalnaFormaLS['napomena'];
            novOrderInfo['id_lokacija']=finalnaFormaLS['id_lokacija'];
          
            if(dan != 'Izaberite dan'  ){
              novOrderInfo['dan']=dan;
              document.getElementById('danGreska').innerHTML='';
            }
           else{
            novOrderInfo['dan']=null;
            novOrderInfo['vreme']=null;
            document.getElementById('danGreska').innerHTML='Morate uneti ispravan dan';
           }
            novOrderInfo['ukupnaCena']=finalnaFormaLS['ukupnaCena'];
            localStorage.setItem('orderInfo',JSON.stringify(novOrderInfo));
            finalnaFormaLS=JSON.parse(localStorage.getItem('orderInfo'));
           
          }
   
          if($(this).attr('name') == 'vreme'){
            var vreme=$(this).val();
            console.log(vreme);
            novOrderInfo['Email']=finalnaFormaLS['Email'];
            novOrderInfo['Ime']=finalnaFormaLS['Ime'];
            novOrderInfo['Prezime']=finalnaFormaLS['Prezime'];
            novOrderInfo['Telefon']=finalnaFormaLS['Telefon'];
            novOrderInfo['broj']=finalnaFormaLS['broj'];
            novOrderInfo['id_grad']=finalnaFormaLS['id_grad'];
            novOrderInfo['id_korisnik']=finalnaFormaLS['id_korisnik'];
            novOrderInfo['interfon']=finalnaFormaLS['interfon'];
            novOrderInfo['sprat']=finalnaFormaLS['sprat'];
            novOrderInfo['tip_Porudzbine']=finalnaFormaLS['tip_Porudzbine'];
            novOrderInfo['ulica']=finalnaFormaLS['ulica'];
            novOrderInfo['nacin_Placanja']=finalnaFormaLS['nacin_Placanja'];
            novOrderInfo['napomena']=finalnaFormaLS['napomena'];
            novOrderInfo['dan']=finalnaFormaLS['dan'];
            novOrderInfo['id_lokacija']=finalnaFormaLS['id_lokacija'];
            if(vreme != 0){
              novOrderInfo['vreme']=vreme;
              document.getElementById('VremeGreska').innerHTML='';
            }
           else{
            novOrderInfo['vreme']=null;
            document.getElementById('VremeGreska').innerHTML='Morate uneti ispravno vreme';
           }
            novOrderInfo['ukupnaCena']=finalnaFormaLS['ukupnaCena'];
            
            localStorage.setItem('orderInfo',JSON.stringify(novOrderInfo));
            finalnaFormaLS=JSON.parse(localStorage.getItem('orderInfo'));
            
          }
          
        })
   }
}
var id;
  window.onload=function(){
    localStorage.removeItem('korpa');
    localStorage.removeItem('korpa2');
    localStorage.removeItem('orderInfo');
    localStorage.removeItem('adresa');
   id=document.getElementById('user').getAttribute('data-User');

  }
  var Adrese = AjaxCallBack('lokacijeAjax','JSON');
  var RadnoV = AjaxCallBack('radnoVremeAjax','JSON');
  var kliknut1;
  var kliknut2;
  var tipDostave;
  var kliknutaAdresa;
    var dugmeDostava = document.getElementsByClassName('order_type_button');
    
    for(var i=0;i < dugmeDostava.length;i++){
     
      dugmeDostava[i].addEventListener('click',function(){
        localStorage.removeItem('adresa');
      
        $(".order_type_button").removeClass('aktivnoDugmeOrder');
        $(this).addClass("aktivnoDugmeOrder");
        tipDostave=$(this).attr('data-otid');
       podaciZaLS['tip_Porudzbine']=tipDostave;
       podaciZaLS['ulica']='';
        kliknut1=$(this);
       
        if(kliknut1 !=null && kliknut2 != null){
        PorudzbinaFormaAdrese(kliknut1,kliknut2,Adrese,RadnoV);
        }
        var adrese = document.querySelectorAll('.adresses_buttons');
        
        for(var z=0;z <adrese.length;z++){
          adrese[z].addEventListener('click',function(){
          
            var trenutnaAdresa=$(this);
            var ostaleAdrese=Array.from(adrese).filter(x=> x.getAttribute('data-id') != trenutnaAdresa.attr('data-id'));
            
           
          cekirajAdresu($(this),ostaleAdrese);
          kliknutaAdresa=$(this)
          })
        }
        
      })
    }
    
    var dugmeLokacije = document.getElementsByClassName('location_order_button');
 
    for(var y=0;y < dugmeLokacije.length;y++){
      dugmeLokacije[y].addEventListener('click',function(){
        kliknut2=$(this);
        
        if(kliknut1 !=null && kliknut2 != null){
          document.getElementById('order_step_2').innerHTML='';
          PorudzbinaFormaAdrese(kliknut1,kliknut2,Adrese,RadnoV);

          var adrese = document.querySelectorAll('.adresses_buttons');
        
        for(var z=0;z <adrese.length;z++){
          adrese[z].addEventListener('click',function(){
          
            var trenutnaAdresa=$(this);
            var ostaleAdrese=Array.from(adrese).filter(x=> x.getAttribute('data-id') != trenutnaAdresa.attr('data-id'));
            var podaciZa={
              id:trenutnaAdresa.attr('data-gradID'),
              adresaLok:trenutnaAdresa.attr('data-adresa')
            }
        
           AjaxForward('sladProdavnice','JSON',podaciZa);
          cekirajAdresu($(this),ostaleAdrese);
          })
        }
        }
      })
    }
    var dugmeLokacija = document.getElementsByClassName('location_order_button');
    var adresa=JSON.parse(localStorage.getItem('adresa'));
    for(var i=0;i < dugmeLokacija.length;i++){
      
      dugmeLokacija[i].addEventListener('click',function(){
        $(".location_order_button").removeClass('aktivnoDugmeOrder');
        $(this).addClass("aktivnoDugmeOrder");
        
      })
   
    }


    //KutijeIspis
    var dugmeKutija = document.getElementById('step3_button');
    var kutije = AjaxCallBack('kutijeAjax','JSON');
    
    function ispisiKutije(){
      var ispis=` <div class="boxes d-flex flex-column justify-content center align-items-center">
      <h3 class="Bungee">Izaberite pakovanje sladoleda</h3>
      <div class="collection_boxes d-flex flex-row justify-content-center align-items-center">`;
      for(var k=0;k<kutije[0].length;k++){
        ispis+=`   
        
        <div class="box_info d-flex flex-column justify-content-center align-items-center" data-id='${kutije[0][k]['id_kutija']}'>
        <img src="../assets/img/kutijaSlad.png">
        <span>${kutije[0][k]['kolicina_kg']}KG</span>
        <p>${kutije[0][k]['cena']}rsd</p>
        </div>
      
          `;
      }
      ispis+=`
      </div><div class="dugme_korpa m-4" >
      <button class="button_order" id="step4_button">Izaberite sladoled</button>
  </div>
  </div>`
  if(podaciZaLS != {}){
    localStorage.setItem('orderInfo',JSON.stringify(podaciZaLS));
  }

      return ispis;
    }
   
    dugmeKutija.addEventListener('click',function(){
      
      if(document.getElementsByClassName('checked').length !=0 || praznaPolja == 0){
      document.getElementById('order_body').innerHTML=
    
          ispisiKutije()
      }

  
      var izabranaKutija;
      function obelezenaKutija(klikKutija){
        idKutije=$(klikKutija).attr('data-id');
        izabranaKutija=IzabranaKutija(idKutije);
        $('.box_info').removeClass('box_info_kliknuta');
        $(klikKutija).addClass('box_info_kliknuta');
        
      }
       var kutijaInfo=document.getElementsByClassName('box_info');
       for(var k=0;k<kutijaInfo.length;k++){
           kutijaInfo[k].addEventListener('click',function(){
               obelezenaKutija($(this));
           })
           
       }

      //sladolediIspis
      

  var dugmeSladoledi=document.getElementById('step4_button');
  var putaKlik=0;
  var NizNarucenihSladoleda=[];
  var NizKutija=[];

  function ispisiPonuduSladoleda(nizSlad,izKutija,){
    putaKlik=0;
    if(nizSlad==undefined){
        nizSlad=AjaxCallBack('sladolediAjax','JSON');
    }
    if(izKutija !=null){
      var kolicina_max=izKutija['kolicina_ukusa'];
    }
    
    document.getElementById('order_body').innerHTML=`
    <div class="flavours_section">
    <div class="flavours_order">
    
    <button class="flavors_backBtn" id="flavors_back_btn" >Odustani</button>
    
    <div class="kutija d-flex justify-content-center align-items-center flex-md-row flex-column" id="cart_info_order">
    <div class="d-flex flex-row justify-content-center align-items-center">
          <div class="kutija_info d-flex flex-column justify-content-center align-items-center">
              <span class="font-Linotte">${izKutija['kolicina_kg']*1000}gr</span>
              <small class="font-Linotte">${izKutija['cena']} RSD</small>
          </div>
          <div class="kutija_kolicina">
              <div class="input_kutija" id="kutija_sadrzaj">
                  
              </div>
          </div>
          </div>
          <div class="dugme_korpa">
              <button id="dodajKorpa">Dodaj u korpu</button>
          </div>
          <div id="poruka_max_slad" data-errMessage=''></div>
    </div>
    <hr>
  
    

</div>


<div class="flavors_categories">
      <ul class="list-unstyled order_flavors_categories_list">
      `+ispisiKategorijeSlad()+` 
      </ul>
</div>


  <div class="flavours_list">
      <ul class="list-unstyled order_flavors_list" id="ukusIspis">
      <!--IspisAJAX-->
          
      </ul>
  </div>
  
</div>
</div>
    `;
    if(kolicina_max ==4){
        document.getElementById('kutija_sadrzaj').style.width="200px";
        
    }
    var dugmeUkusiNarudzbinaNazad=document.getElementById('flavors_back_btn');
   
    dugmeUkusiNarudzbinaNazad.addEventListener('click',function(){
      localStorage.removeItem('korpa');
      localStorage.removeItem('korpa2');
      localStorage.removeItem('orderInfo');
      localStorage.removeItem('adresa');
          window.location.reload();
  
    })
    ispisiSladolede(nizSlad);
    console.log(nizSlad);
    var kategorijeHTML=document.querySelectorAll('.kategorije');
 
    var kategorijeSladOrder=Array.from(kategorijeHTML);
   
    for(var k=0; k < kategorijeSladOrder.length;k++){
      kategorijeSladOrder[k].addEventListener('click',function(){
        
        filtriraj($(this).attr('data-category'),nizSlad);
      })
    }

    $('.slad_order').on('click', function () {
    
      var kutija_kolicina=document.getElementById('kutija_sadrzaj'); 
      var maks_kolicina=izabranaKutija['kolicina_ukusa'];
       var idNarucenog=$(this).attr('data-sladOrderID');

      if(putaKlik ==maks_kolicina){
           $('#poruka_max_slad').attr('data-errMessage',`Ne mozete uneti vise od ${maks_kolicina} ukusa`);
           $("#poruka_max_slad").show().delay(3000).fadeOut();
      }
      if($('#kutija_sadrzaj').children('.item_box').length < maks_kolicina && putaKlik <maks_kolicina && $('#kutija_sadrzaj') !=null && $(this).parent('.flavour_content').hasClass('vidljivost')){
       putaKlik+=1;
     
      var slika=$(this).parent('.flavour_content').find("img").eq(0)[0].src;
      
       var cart = $('.input_kutija');
       var imgtodrag = $(this).parent('.flavour_content').find("img").eq(0);
      
       if (imgtodrag) {
           var imgclone = imgtodrag.clone()
               .offset({
               top: imgtodrag.offset().top,
               left: imgtodrag.offset().left
           })
               .css({
               'opacity': '0.8',
                   'position': 'absolute',
                   'height': '150px',
                   'width': '150px',
                   'z-index': '100'
           })
               .appendTo($('body'))
               .animate({
               'top': cart.offset().top + 10,
                   'left': cart.offset().left + 50,
                   'width': 75,
                   'height': 75
           }, 1000, 'easeInOutExpo');
           
           
   
           imgclone.animate({
               'width': 0,
                   'height': 0
           }, function () {
             if(maks_kolicina ==4){
               document.getElementById('kutija_sadrzaj').innerHTML+=`<div class="item_box d-flex flex-column" style="max-width:20% !important"><img src="${slika}" data-sladID='${idNarucenog}'><button class="del" data-Rem='${idNarucenog}'>x</button></div>`;
             }
             if(maks_kolicina == 3){
               document.getElementById('kutija_sadrzaj').innerHTML+=`<div class="item_box d-flex flex-column"><img src="${slika}" ><button class="del" data-Rem='${idNarucenog}'>x</button></div>`;
             }
               $(this).detach()
               var itemsUKorpi=Array.from(document.getElementsByClassName('del'));
               NizNarucenihSladoleda.push(dohvatiSladoled(idNarucenog));
               
   for(var i=0; i <itemsUKorpi.length;i++){
    
    
     itemsUKorpi[i].addEventListener('click',function(){
       $(this).parent().remove();
      
       putaKlik-=1;
    
       var index= NizNarucenihSladoleda.findIndex(x=>x['id_sladoled'] == $(this).attr('data-Rem'));
       NizNarucenihSladoleda.splice(index,1);
       
     })
     }
           });
           
     }
     
       }
       
      
      
   
   }); 
  }
 
  var objNarUkusa={};
  var nizIdUkusa=[];
  var brojac=1;
      function dodajuKorpu(){
        
        var maks_kolicina=izabranaKutija['kolicina_ukusa'];
        objNarUkusa={};
        if(NizNarucenihSladoleda.length ==maks_kolicina){

          for(var i=0; i< NizNarucenihSladoleda.length;i++){
              objNarUkusa["id_ukus"+i]=NizNarucenihSladoleda[i]['id_sladoled']
              
          }
          objNarUkusa['id_kutija']=izabranaKutija['id_kutija'];
          objNarUkusa['id_NarucenaKutija']=brojac;
          objNarUkusa['cena']=izabranaKutija['cena'];
          objNarUkusa['korisnik']=document.getElementById('user').getAttribute('data-user');
          objNarUkusa['kolicina']=1;
          nizIdUkusa.push(objNarUkusa);
        
          
          NizKutija.push(NizNarucenihSladoleda);
          NizNarucenihSladoleda=[];
         
          this.localStorage.setItem('korpa',JSON.stringify(nizIdUkusa));
          korpaLocal=localStorage.getItem('korpa');
          document.getElementById('cart_info_order').innerHTML=`
          <button class="order_button" id="ponovna_kupovina">nastavite kupovinu</button>
          
          <button class="order_button" id="porudzbina_kraj">zavrsite porudzbinu</button>`
        
          
    }
    else{
  
      $('#poruka_max_slad').attr('data-errMessage',`morate uneti bar ${maks_kolicina} ukusa`);
      $("#poruka_max_slad").show().delay(3000).fadeOut();
    }
    brojac++
      }

      
      function ponovnaKupovina(){
        
        document.getElementById('order_body').innerHTML=ispisiKutije();
    var kutijaInfo=document.getElementsByClassName('box_info');
       for(var k=0;k<kutijaInfo.length;k++){
           kutijaInfo[k].addEventListener('click',function(){
               obelezenaKutija($(this));
           })
       }
      }
     
       
     
   
      
       
       
       
       function dohvatiKutije(){
        var nizKutija=[];
    
              var izvucenaKorpa=JSON.parse(localStorage.getItem('korpa'));
              var kutije=AjaxCallBack('kutijeAjax','JSON');
             
             for(var i=0;i < izvucenaKorpa.length;i++){
              nizNaziva=[];
              for(const [key,value] of Object.entries(izvucenaKorpa[i])){
            
                if(key.startsWith('id_kutija')){
                  for(var s=0;s<kutije[0].length;s++){
                    
                        if(value == kutije[0][s]['id_kutija']){
                          nizKutija.push(kutije[0][s]);
                        }
                     
                }
              }
             
              }

             }
              return nizKutija;
       }
      
      function porucivanje(){
        var sladoledi = AjaxCallBack('sladProdavnice','JSON');
    
   
    
ispisiPonuduSladoleda(sladoledi,izabranaKutija);
  
    
  

  
  
var dugme=document.getElementById('dodajKorpa');

dugme.addEventListener('click',function(){
      dodajuKorpu();
      var ponKup=document.getElementById('ponovna_kupovina');
  ponKup.addEventListener('click',function(){
    
    ponovnaKupovina();
    document.getElementById('step4_button').addEventListener('click',function(){
      porucivanje();
    })
  });
  var zavrsiKupovinu=document.getElementById('porudzbina_kraj');
  zavrsiKupovinu.addEventListener('click',function(){
    
     
    ispisiKorpu();
       
  });
})
      
      }
  dugmeSladoledi.addEventListener('click',function(){
   porucivanje();
  
  });
 
    })


    
   
    
    
   
   
    

}
if(stranica =="admin.php"){
  var upload=document.getElementById('imgUpload');
  var preview=document.getElementById('picturePrev');
  upload.onchange= evt =>{
    const[file]=upload.files
    if(file){
      preview.src=URL.createObjectURL(file)
      preview.classList.add('d-block');
      preview.classList.remove('d-none');
    }
  }
  var upload2=document.getElementById('imgUploadClanak');
  var preview2=document.getElementById('picturePrev2');
  upload2.onchange= evt =>{
    const[file]=upload2.files
    if(file){
      preview2.src=URL.createObjectURL(file)
      preview2.classList.add('d-block');
      preview2.classList.remove('d-none');
      document.getElementById('linkUpload').value=null;
    }
  }
  var linkUpload=document.getElementById('linkUpload');
  linkUpload.onchange=evt=>{
    const[file2]=upload2.files;
    document.getElementById('imgUploadClanak').value=null;
    preview2.classList.remove('d-block');
    preview2.classList.add('d-none');
  }
}
