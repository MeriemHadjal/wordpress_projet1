
console.log('coucou');

// ######################## EQUALIZER #####################

// $.fn.equalizerAnimation = function(speed){
//     var $equalizer = $(this);
//     setInterval(function(){
//         $equalizer.find('span').eq(0).css({height:randomBetween(20,40)+'px'});
//         $equalizer.find('span').eq(1).css({height:randomBetween(30,70)+'px'});
//         $equalizer.find('span').eq(2).css({height:randomBetween(40,80)+'px'});
//         $equalizer.find('span').eq(3).css({height:randomBetween(30,80)+'px'});
//         $equalizer.find('span').eq(4).css({height:randomBetween(30,60)+'px'});
//     },speed);
//     $equalizer.on('click',function(){
//         $equalizer.toggleClass('paused');
//     });
// }
// $('.equalizer').equalizerAnimation(180);

// function randomBetween(min, max) {
//     if (min < 0) {
//         return min + Math.random() * (Math.abs(min)+max);
//     }else {
//         return min + Math.random() * max;
//     }
// }





// jQuery.post(
//     ajaxurl,
//     {
//         'action': 'mon_action',
        
//     },
//     function(response){
//             console.log(response);
//             jQuery('.somewhere').append(response);
//         }
// );

var formulaire = document.querySelector("#contact");
var email = document.querySelector("#email");
var name = document.querySelector("#name");
var message = document.querySelector("#message");



// TANT QU4ON EST PAS DANS LA PAGE FORMULAIRE SUR LE BOUTON SUBMIT
btn_submit=document.querySelector("#contact");
if(btn_submit !== null){


document.querySelector("#contact").addEventListener("submit", function (event) {
    event.preventDefault();

    var error;
    var errorname = document.querySelector("#errorname");
    var erroremail = document.querySelector("#erroremail");
    var errormessage = document.querySelector("#errormessage");

    var alphabet = /^[A-Z][A-Za-z' -]+$/;
    var errormail = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;


    function Veriffull_name() {
        console.log("le nom est bien renseigné");
        if (full_name.value==="") {
            errorfull_name.innerTEXT = "Veuillez renseigner vos informations";
            return false;
            console.log(errorfull_name);
        } else if (!valeurfull_name.match(alphabet)) {
            errorfull_name.innerTEXT = "Veuillez respecter les caractères";
            return false;
            console.log(errorfull_name);
        } else if (full_name.value > 10) {
            errorfull_name.innerTEXT = "Veuillez respecter les catractères";
            return false;
            console.log(errorfull_name);
        } else {
            errorfull_name.innerTEXT = "";
                        return true;
        }
    };

    Veriffull_name();


    function Verifemail() {
        console.log("l'email est correct");
        if (email.value==="") {
            erroremail.innerTEXT = "Veuillez renseigner votre email";
            return false;
            console.log(erroremail);
        } else if (!email.value.match(errormail)) {
            erroremail.innerTEXT = "Veuillez respecter les caractères";
            return false;
            console.log(erroremail);
        } else {
            erroremail.innerTEXT = ""
                        return true;
        }
    }

    Verifemail();

    function Verifmessage() {
        console.log("le message a bien été saisi");
        if (message.value === "") {
            errormessage.innerTEXT = "Veuillez saisir un message";
            return false;
            console.log(erroremail);
        } else {
            errormessage.innerTEXT = "";
                        return true;
        }
    }
    Verifmessage();

    function Verifformulaire() {

        if (error == false) {
            alert("formulaire non envoyé !");
            console.log("formulaire non envoyé");
        } else {
            alert("formulaire envoyé");
        }
    }

    Verifformulaire();



});
}




// ***************** SCROLL PAGE ACTU DU VINYLE *************************
const appli = {
    SELECTOR : {
        elActu : document.querySelector('#actu'),
        elVinyle : document.querySelector('#type_musicaux')
    },
    PROPERTIES : {
        urlApiRest : '',
        categoryID : '',
        postPerPage : 9,
        offset : 0, //à aprtir du pointeur 0 puisqu'on veut qu'il affiche des éléments de 0 à 9
        totalPage : 0,
        currentPage : 1,
        etatScroll : false
    },
        
    EVENT:{
        defile : function(){
            document.addEventListener('scroll',function(){
                appli.displayPost();
            })
        },
        defileVinyle : function(){
            document.addEventListener('scroll',function(){
                appli.displayVinyle();
            })
        }
    },
        
    init: function(){
        if(this.SELECTOR.elActu !== null){
        //ou if(appli.SELECTOR.alActu !== null)
            this.PROPERTIES.urlApiRest = this.SELECTOR.elActu.dataset.url;
            //dataset = pour récuperer un attribut data + .url pour préciser lequel
            this.PROPERTIES.categoryID = this.SELECTOR.elActu.dataset.categoryid;
            
            if(this.PROPERTIES.urlApiRest !== ''&& !isNaN(this.PROPERTIES.categoryID)){
                this.infiniteScrollActu();
                this.EVENT.defile();
            }
        }
        if(this.SELECTORelVinyle !== null){
            //ou if(appli.SELECTOR.alActu !== null)
            this.PROPERTIES.urlApiRest = this.SELECTOR.elVinyle.dataset.url;
            //dataset = pour récuperer un attribut data + .url pour préciser lequel
            this.PROPERTIES.categoryID = this.SELECTOR.elVinyle.dataset.categoryid;
            
            if(this.PROPERTIES.urlApiRest !== ''&& !isNaN(this.PROPERTIES.categoryID)){
                this.infiniteScrollVinyle();
                this.EVENT.defileVinyle();
            }
        }


    },

        
    infiniteScrollActu :async function(){
        // console.log('ouf');
        this.PROPERTIES.offset = (this.PROPERTIES.currentPage - 1)*this.PROPERTIES.postPerPage;
        response = await fetch(this.PROPERTIES.urlApiRest + '?_embed=true&per_page='+this.PROPERTIES.postPerPage+'&offset='+this.PROPERTIES.offset);
        //maintenant la console affihe un array avec 9 éléments comme on vient de le definir (2ème com)
        //il faut faire évaluer le offset pour cela voir ligne30
        this.PROPERTIES.totalPage = response.headers.get('X-WP-TotalPages');
        //on recupère les variables dans la console/network/headers
        data = await response.json();
        console.log(data);
        //on verifie dans la console et normalement on a bien array avec 10 éléments par défaut (1er com)
        if(data.length > 0){
            for(post of data){
                if( post.featured_media !== 0 ){
                    displayImg = `<img src="${post._embedded['wp:featuredmedia'][0].media_details.sizes.thumbnail.source_url}" class="card-img-top" />`;
                }else{
                    displayImg = `<img src="https://picsum.photos/200/300" class="card-img-top" />`;
                }
                this.SELECTOR.elActu.innerHTML +=`<div class="col-4 mb-4">
                <div class="card" style="width: 18rem;">
                ${displayImg}
                <div class="card-body">
                <h5 class="card-title">${post.title.rendered}</h5>
                    <p class="card-text">${post.excerpt.rendered}</p>
                <a href="${post.link}" class="btn btn-primary">Lire l'article</a>
                </div>
                </div>
                </div>`;
                console.log(this.SELECTOR.elActu.innerHTML);
            }
            this.PROPERTIES.currentPage += 1;
            //on dit à ce moment qu'on change de page puisqu'on a déjà chargé les 9 premiers
            this.PROPERTIES.etatScroll = false;
        }
        
    },

    displayPosts : function(){
        pageHeight = document.documentElement.offsetHeight;
        //console.log(pageHeight);
        windowHeight = window.innerHeight;
        //console.log(pageHeight + "-" + windowHeight);
        scrollPosition = window.scrollY || window.pageYOffset || document.body.scrollTop +(document.documentElement && document.documentElement.scrollTop || 0);
        //car tous les navigateurs ne traitent pas scrollY
//        console.log(scrollPosition);
        
        if(pageHeight <= windowHeight + scrollPosition){
//            console.log('je suis en bas');
            if(this.PROPERTIES.currentPage <= this.PROPERTIES.totalPage){
                if(this.PROPERTIES.etatScroll === false){
                    this.PROPERTIES.etatScroll = true ;
                    this.infiniteScrollActu();
                }
            }
        }
    },

    
    infiniteScrollVinyle : async function (){
        // console.log('ouf');
        this.PROPERTIES.offset = (this.PROPERTIES.currentPage - 1)*this.PROPERTIES.postPerPage;
        response = await fetch(this.PROPERTIES.urlApiRest + '?_embed=true&per_page='+this.PROPERTIES.postPerPage+'&offset='+this.PROPERTIES.offset +'&type_musicaux='+this.PROPERTIES.categoryID);
        //maintenant la console affihe un array avec 9 éléments comme on vient de le definir (2ème com)
        //il faut faire évaluer le offset pour cela voir ligne30
        this.PROPERTIES.totalPage = response.headers.get('X-WP-TotalPages');
        //on recupère les variables dans la console/network/headers
        data = await response.json();
        console.log(data);
        //on verifie dans la console et normalement on a bien array avec 10 éléments par défaut (1er com)
        if(data.length > 0){
            for(post of data){
                if( post.featured_media !== 0 ){
                    displayImg = `<img src="${post._embedded['wp:featuredmedia'][0].media_details.sizes.thumbnail.source_url}" class="card-img-top" />`;
                }else{
                    displayImg = `<img src="https://picsum.photos/200/300" class="card-img-top" />`;
                }
                this.SELECTOR.elVinyle.innerHTML +=`<div class="col-4 mb-4">
                <div class="card" style="width: 18rem;">
                ${displayImg}
                <div class="card-body">
                <h5 class="card-title">${post.title.rendered}</h5>
                <p class="card-text">${post.excerpt.rendered}</p>
                <a href="${post.link}" class="btn btn-primary">Lire l'article</a>
                </div>
                </div>
                </div>`;
                console.log(this.SELECTOR.elVinyle.innerHTML);
            }
            this.PROPERTIES.currentPage += 1;
            //on dit à ce moment qu'on change de page puisqu'on a déjà chargé les 9 premiers
            this.PROPERTIES.etatScroll = false;
        }
        
    },

    displayVinyle : function (){
        pageHeight = document.documentElement.offsetHeight;
        //console.log(pageHeight);
        windowHeight = window.innerHeight;
        //console.log(pageHeight + "-" + windowHeight);
        scrollPosition = window.scrollY || window.pageYOffset || document.body.scrollTop +(document.documentElement && document.documentElement.scrollTop || 0);
        //car tous les navigateurs ne traitent pas scrollY
//        console.log(scrollPosition);
        
        if(pageHeight <= windowHeight + scrollPosition){
//            console.log('je suis en bas');
            if(this.PROPERTIES.currentPage <= this.PROPERTIES.totalPage){
                if(this.PROPERTIES.etatScroll === false){
                    this.PROPERTIES.etatScroll = true ;
                    this.infiniteScrollVinyle();
                }
            }
        }
    }

}



    window.onload = appli.init();

    // ############################ SLIDER ######################################
    
    
//     var timer = new Object;

// $(function(){
//     var $Slides = $("#slides");
//     var _step = 980;
//     $Slides
//         .data("currentSlide",1)
//         .data("nbSlides",$Slides.find("li").size());
//     $Slides
//         .find("li:last")
//             .clone()
//             .prependTo("#slides");

//     $Slides
//         .find("li:first")
//             .next()
//             .clone()
//             .appendTo("#slides");

//     $Slides        
//         .find("li:first")
//             .addClass("clone")
//         .end()
//         .find("li:last")
//             .addClass("clone")
//         .end()
//         .css({marginLeft:-_step});

//     $Slides.width($Slides.find("li").length*_step);

//     $("#nextSlide").bind("click",nextSlide);
//     $("#prevSlide").bind("click",prevSlide);
//     timer = window.setTimeout(slider,5000);

// })
// function nextSlide(){
//     var $Slides = $("#slides");
//     $("#nextSlide").unbind("click",nextSlide);
//     $Slides.animate(
//         {marginLeft:"-=980px"},
//         1000,
//         function(){
//                 $Slides.data("currentSlide",$Slides.data("currentSlide")+1);
//                 if($Slides.data("currentSlide") > $Slides.data("nbSlides")){
//                     $Slides
//                         .data("currentSlide",1)
//                         .css({marginLeft:"-980px"});
//                 }
//                 window.clearTimeout(timer);
//                 timer = window.setTimeout(slider,5000);
//                 $("#nextSlide").bind("click",nextSlide);
//             }
//     );
// }

// function prevSlide(){
//     var $Slides = $("#slides");
//     $("#prevSlide").unbind("click",prevSlide);
//     $Slides.animate(
//         {marginLeft:"+=980px"},
//         1000,
//         function(){
//                 $Slides.data("currentSlide",$Slides.data("currentSlide")-1);
//                 if($Slides.data("currentSlide") == 0){
//                     $Slides
//                         .data("currentSlide",$Slides.data("nbSlides"))
//                         .css({marginLeft:-(980*$Slides.data("currentSlide"))});
//                 }
//                 window.clearTimeout(timer);
//                 timer = window.setTimeout(slider,5000);
//                 $("#prevSlide").bind("click",prevSlide);
//             }
//     );
// }
  