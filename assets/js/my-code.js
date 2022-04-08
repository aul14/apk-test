// const list = document.querySelector('#div-serti');
// var tgl = document.getElementById('tgl1')
// list.style.display = "none";
// const showBox = document.querySelector('#c-serti');
// showBox.addEventListener('change', function (e) {
//     // console.log(e);
//     if(showBox.checked){
//         list.style.display = "initial";
//     } else {
//         list.style.display = "none";
//         tgl.innerHTML = "";
//     }
// // });
// var tgl_id = document.getElementById('#div1-');
//     tgl_id = '#div1-' + tgl_id.substr(2, tgl_id.length);
//     $(tgl_id).css({'display': 'none'});
//     var check_id = tgl_id.substr((tgl_id.lastIndexOf("-")+1), tgl_id.length);
// // const list_coa = document.querySelector('#div-coa');
// list_coa.style.display = "none";
// const showBox1 = document.querySelector('#c-coa');
// showBox1.addEventListener('change', function (e) {
//     // console.log(e);
//     if(showBox1.checked){
//         list_coa.style.display = "initial";
//     } else {
//         list_coa.style.display = "none";
//     }
// });

// const list_msds = document.querySelector('#div-msds');
// list_msds.style.display = "none";
// const showBox2 = document.querySelector('#c-msds');
// showBox2.addEventListener('change', function (e) {
//     // console.log(e);
//     if(showBox2.checked){
//         list_msds.style.display = "initial";
//     } else {
//         list_msds.style.display = "none";
//     }
// });

// const list_halal = document.querySelector('#div-halal');
// list_halal.style.display = "none";
// const showBox3 = document.querySelector('#c-halal');
// showBox3.addEventListener('change', function (e) {
//     // console.log(e);
//     if(showBox3.checked){
//         list_halal.style.display = "initial";
//     } else {
//         list_halal.style.display = "none";
//     }
// });

// const list_flowchart = document.querySelector('#div-flowchart');
// list_flowchart.style.display = "none";
// const showBox4 = document.querySelector('#c-flowchart');
// showBox4.addEventListener('change', function (e) {
//     // console.log(e);
//     if(showBox4.checked){
//         list_flowchart.style.display = "initial";
//     } else {
//         list_flowchart.style.display = "none";
//     }
// });

// const list_coo = document.querySelector('#div-coo');
// list_coo.style.display = "none";
// const showBox5 = document.querySelector('#c-coo');
// showBox5.addEventListener('change', function (e) {
//     // console.log(e);
//     if(showBox5.checked){
//         list_coo.style.display = "initial";
//     } else {
//         list_coo.style.display = "none";
//     }
// });
// // function initUploadDropzone(id_elm)
// //   {
// //     Dropzone.autoDiscover = false;

// //     var foto_upload = new Dropzone(id_elm, {
// //       autoDiscover: false,
// //       url: SITE_URL + "proses/regis_halal/tambah",
// //       maxFilesize: 50,
// //       method:"post",
// //       paramName: "userfile",
// //       dictInvalidFileType:"Type file ini tidak dizinkan",
// //       addRemoveLinks:true,
// //       removedfile: function(file)
// //       {
// //         var server_file = jQuery(file.previewTemplate).children('.server_file').text();
// //         if(server_file == ''){
// //           server_file = file.name;
// //         }

// //         jQuery.ajax({
// //           method: 'POST',
// //           url: SITE_URL + 'trx/ajukan_pemusnahan/dropzone_delete',
// //           data: {
// //             filename: server_file
// //           },
// //           success: function(res){
// //             jQuery(file.previewTemplate).remove();
// //           },
// //           error: function(res){
// //             console.error('ketika hapus dropzone file di server');
// //           }
// //         });
// //       },
// //       success: function(file, response)
// //       {
// //         if(response !== null)
// //         {
// //           var res = JSON.parse(response);
// //           jQuery(file.previewTemplate).append('<span class="server_file">'+ res.file_name_server +'</span>');
// //         }
// //       }
// //     });

// //     //Event ketika Memulai mengupload
// //     foto_upload.on("sending",function(a,b,c){
// //       a.token=Math.random();
// //       c.append("token_foto",a.token); //Menmpersiapkan token untuk masing masing foto
// //     });
// //   }

// //   $("#complete-attachment input[type='checkbox']").click(function(){
// //     var obj_id = $(this).attr('id');
// //     obj_id = '#dropzone-' + obj_id.substr(4, obj_id.length);
// //     var attach_id = obj_id.substr((obj_id.lastIndexOf("-")+1), obj_id.length);

// //     if($(this).prop('checked'))
// //     {
// //       if($(obj_id).hasClass('dropzone') === false){
// //         $(obj_id).attr('class', 'dropzone');
// //       }

// //       $(obj_id).css({'display': 'block'});
// //       initUploadDropzone(obj_id, attach_id);
// //     }
// //     else
// //     {
// //       $(obj_id).css({'display': 'none'});
// //     }
// //   });
