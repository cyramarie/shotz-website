$(function(){ 
    //FETCH PUBLIC IMAGE ajax request
       fetchAllImagesPublic();
       function fetchAllImagesPublic(){
           $.ajax({
               url: 'action2.php',
               method: 'post',
               data: { fetch_all_images_public: 1 },
               success: function(response){
                   $("#row").html(response);
               },
           });
       }
       
       //modal FULL IMAGE view
       $(document).on("click", ".open_image", function(e){
           
           e.preventDefault();
           let image_id = $(this).attr("id");
           //console.log(image_id);
           
           $.ajax({
               url: "action2.php",
               method: 'post',
               data:{image_id: image_id},
               dataType: "json",
               success: function(response){
                   $("#set_image").attr("src", "uploads/" + response.image_path);
                   $("#set_image").attr("alt", response.alt_text);
                   $("#image_alt_text").text(response.alt_text);
                   $("#set_dl").attr("href", "uploads/" + response.image_path);
                   $("#set_dl").attr("download", response.alt_text);
               },
           });
       });	
       
       //Fetch search result image
       $(document).on("click", ".search_img", function(e){
           
           e.preventDefault();
           let search_img = document.getElementById("search_bar").value;
           
           if(search_img == "") {
               fetchAllImages();
           } 
           else {
               $.ajax({
                   url: 'action2.php',
                   method: 'post',
                   data: {search_img: search_img},
                   success: function(response){
                       $("#row").html(response);
                   },
               });		
           }
       });	
   



       
   
   
   
});
   
   /** FOR SEARCHING OF USERS SANA KASO DI AKO MAGKAIGI
       $(document).on('keyup','#searchUser',function(){
           var search_term = $('#searchUser').val().trim();
           $.ajax({
               type: "POST",
               url: 'action2.php',
               data:{search:search_term},
               success: function(response){
                   $('#showlist').html('');
                   var jsonData = JSON.parse(response);
   
                   $.each(jsonData, function(key,val){
                       $('#showlist').append(val.name + '<br>');
                   });
               }
           });
   
       });
   
       */
