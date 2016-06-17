

var show_mesg=function(str){
	$('.mesage').html('<p>'+str+'</p>');
	setTimeout(function(){$('.mesage p').hide();},5000);
};

var show_mesg_trans=function(str){
	s('.loanding').css('visibility','visible');
	s('.loanding').html('<h2>'+str+'</h2>');
		setTimeout(function(){$('.loanding').css('visibility','visible');},5000);
};


$(document).ready(function(){


$.ajax({

	url:'home/mostrar_anuncios',
	dataType:'json',
	success:function(json){

		mostrar_anuncios(json);
	}


});


function mostrar_anuncios(json){
	str = "";
	tamany= json.length;
	for(i=0;i<tamany;i++){
		str+='<div class="anuncio">';
	 	str+='<h2>'+json[i].Titulo+'</h2>';
	 	str+='<img   src="sin_foto.jpg" width="100%">';
	 	str+='<p>'+json[i].Descripcio+'</p>';
	 	str+='<p>'+json[i].data_publicacio+'</p>';
	 	str+='<p>'+json[i].Estat+'</p>';
	 	str+='<input class="bt" type="button" value="Ver Anuncio">';
	 	str+='</div>';
	 	$(".caja_anuncio").append(str);
	 	str="";

	}

}



$('#form-log').on('submit',function(){  //id de formulario de mi head.php

	var postData = $(this).serialize();
	var formURL = $(this).attr("action");
	$.ajax({
		url:formURL,
		data:postData,
		method:'post',
		dataType:'json',
		success:function(output){ //resp o output??? de donde viene??
			console.log(output);
			 if(output.redirect===(window.location.pathname+'dashboard')){
			 	show_mesg('Login correcte');
			 }else{
			 	show_mesg('Usuari Inexistent');
			 }

			 window.location.href=output.redirect;
		}

	});


return false;

});


$('.reg').on('submit',function(){  //id de formulario de mi head.php

	var postData = $(this).serialize();
	var formURL = $(this).attr("action");
	$.ajax({
		url:formURL,
		data:postData,
		method:'post',
		dataType:'json',
		success:function(output){ //resp o output??? de donde viene??
			console.log(output);
			 if(output.redirect===(window.location.pathname+'dashboard')){
			 	show_mesg('Login correcte');
			 }else{
			 	show_mesg('Usuari Inexistent');
			 }

			 window.location.href=output.redirect;
		}

	});


return false;

});



//comprovacio passwords

$('#repass').focusout(function(){  //id de mi formulario COMPROBACIÓN DE CONTRASSEÑA
	var pass=$('#pass').val();
	var repass=$('#repass').val();
	if(pass!==repass){
		show_mesg('Les contrassenyes no son iguals');
	}
});



 var pathname = window.location.pathname;
	 aux_path = pathname.split('/');
	 
	 if(aux_path[aux_path.length-1] == 'admin'){
	     

	$.ajax({

		url:'dashboard/mostrar_usuarios',//recoger lo del controlador y el modelo
		dataType:'json',
		success:function(resposta){ 
			var usuarios = '';
			var cont = resposta.length;

			usuarios+='<table border=2><tr><th>ID</th><th>Nombre</th><th>Contraseña</th><th>Email</th><th>Telefono</th><th>Rol</th><th>Eliminar</th><th>Editar</th></tr>';
			for(var i=0;i<cont;i++){
				usuarios=usuarios+'<tr><td>'+resposta[i].id_usuaris+'</td>';
				usuarios=usuarios+'<td>'+resposta[i].Nom+'</td>';
				usuarios=usuarios+'<td>'+resposta[i].Contrassenya+'</td>';
				usuarios=usuarios+'<td>'+resposta[i].Email+'</td>';
				usuarios=usuarios+'<td>'+resposta[i].Telefon+'</td>';
				usuarios=usuarios+'<td>'+resposta[i].Rol_id_rol+'</td>';
				usuarios=usuarios+'<td><button onclick="eliminar('+resposta[i].id_usuaris+')"> Eliminar';
				usuarios=usuarios+'</button></td>';
				usuarios=usuarios+'<td><button onclick="generar_usuario('+resposta[i].id_usuaris+')"> Editar';
				usuarios=usuarios+'</button></td>';
			
			}

			usuarios=usuarios+'</table>';
			$('#tabla_usuarios').html(usuarios);
		}

	});

}//mostrar_usuarios


}); //documentready

function eliminar(id){

	    $.ajax({
	    		   type:"POST",
			       url:"dashboard/eliminar_usuarios",
			       data:{idusuario:id},
			       success:function(output){
			       location.reload();
			       }
			    });

}





//Fuera del document ready pork la tabla no existe inicialmente hasta que se carga.


function generar_usuario(id){
	$.ajax({
		type:'POST',
		url:'dashboard/editar_formulario',//recoger lo del controlador y el modelo
		data:{idusuario:id},
		dataType:'json',
		success: function(resposta){
			formulario2(resposta);
		}
		
	});

}//eliminar_usuario()

function formulario2(resposta){

		var form='';
			form=form + "<form>";
			form=form + "<input type='text' id='editar_nombre' value='"+resposta.Nom+"'>";
			form=form + "<input type='text' id='editar_passwd' value='"+resposta.Contrassenya+"'>";
			form=form + "<input type='text' id='editar_email' value='"+resposta.Email+"'>";
			form=form + "<input type='text' id='editar_tel' value='"+resposta.Telefon+"'>";
			form=form + "<input type='text' id='editar_rol' value='"+resposta.Rol_id_rol+"'>";
			form=form + "<input value='Editar' type='button' onclick='editar_usuario("+resposta.id_usuaris+")'>";
			form=form + "</form>";

			$('#editar_formulario').html(form);		


}

function editar_usuario(id){

var id = id;
var nombre = $("#editar_nombre").val();
var passwd = $("#editar_passwd").val();
var email = $("#editar_email").val();
var tel = $("#editar_tel").val();
var rol = $("#editar_rol").val();

$.ajax({
		type:'POST',
		url:'dashboard/editar_usuario',//recoger lo del controlador y el modelo
		data:{idusuario:id,nombre:nombre,passwd:passwd,email:email,tel:tel,rol:rol},
});

location.reload();

}