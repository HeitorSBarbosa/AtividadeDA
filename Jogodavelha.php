<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Véia's Game</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<style>
		.tableJogoVelha{
            background-color: #E0FFFF;
        }

		.celula{
			width: 50px;
    		height: 50px;
		}

        .celula:hover{
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        }

        .card{
            width: 155px;
            height: 160px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            margin: 5% 20% 15% 43%;
        }

        .container {
            padding: 2px 16px;
        }

		.vezD{
			text-align: center;
			margin-top: 10%;
			padding-right: 2%;
		}

		.btn{
			margin-top: 15%;
		}
	</style>
</head>
<body>
	<h2 class="vezD" id="vezD"> Vez do <i class='fas fa-times'></i></h2>
	<div class="card">
        <div class="container"> 
		    <table class="tableJogoVelha"  border="1">
		    	<tr>
		    		<td class="celula" id="linha1Coluna1" onclick="adicionarXAqui('linha1Coluna1', 1, 'vezD')"></td>
		    		<td class="celula" id="linha1Coluna2" onclick="adicionarXAqui('linha1Coluna2', 2, 'vezD')"></td>
		    		<td class="celula" id="linha1Coluna3" onclick="adicionarXAqui('linha1Coluna3', 3, 'vezD')"></td>
		    	</tr>
		    	<tr>
		    		<td class="celula" id="linha2Coluna1"  onclick="adicionarXAqui('linha2Coluna1', 4, 'vezD')"></td>
		    		<td class="celula" id="linha2Coluna2"  onclick="adicionarXAqui('linha2Coluna2', 5, 'vezD')"></td>
		    		<td class="celula" id="linha2Coluna3"  onclick="adicionarXAqui('linha2Coluna3', 6, 'vezD')"></td>
		    	</tr>
		    	<tr>
		    		<td class="celula" id="linha3Coluna1" onclick="adicionarXAqui('linha3Coluna1', 7, 'vezD')"></td>
		    		<td class="celula" id="linha3Coluna2" onclick="adicionarXAqui('linha3Coluna2', 8, 'vezD')"></td>
		    		<td class="celula" id="linha3Coluna3" onclick="adicionarXAqui('linha3Coluna3', 9, 'vezD')"></td>
		    	</tr>
            </table>
		</div>  
		<button type="button" class="btn btn-info" onclick="document.location.reload(true);">Reiniciar</button>
    </div>

</body>


	<script type="text/javascript">
		var qMarcados = [];

		var arrayIdComQuadrante = [
			"",  //index 0
			"linha1Coluna1", // index 1
			"linha1Coluna2", // index 2
			"linha1Coluna3", // index 3
			"linha2Coluna1", // index 4
			"linha2Coluna2", // index 5
			"linha2Coluna3", // index 6
			"linha3Coluna1", // index 7
			"linha3Coluna2", // index 8
			"linha3Coluna3", // index 9
		]
		

		function adicionarXAqui(idCelula, quadrante, vezD){	
			if(qMarcados.indexOf(quadrante) == -1 ){
				preencheVelha(idCelula, "x", quadrante)
				var vezD = document.getElementById(vezD);
				vezD.innerHTML = "Vez do <i class='far fa-circle'></i>";
				setTimeout(() => {  JogadaMaquina('vezD'); }, 2000);			
			}						
		}

        function preencheVelha(idQuadrante, tipo, valorQuadrante){
			var elemento = document.getElementById(idQuadrante);
			if(tipo == "x"){
				elemento.innerHTML = "<i class='fas fa-times'></i>";
			}else{
				elemento.innerHTML = "<i class='far fa-circle'></i>";
			}
			qMarcados.push(valorQuadrante); //adiciona elementos a um array	
		}

		function JogadaMaquina(vezD){
			var qMaquina;
			do{
			qMaquina = Math.floor(Math.random() * 10);
			}while (qMaquina==0);

			if(qMarcados.indexOf(qMaquina) == -1 ){
				console.log("MARQUEI O " + qMaquina );

				idQMaquina = arrayIdComQuadrante[qMaquina]
		
				preencheVelha(idQMaquina, "0", qMaquina)

				var vezD = document.getElementById(vezD);
				vezD.innerHTML = "Vez do <i class='fas fa-times'></i>";
			}else if(qMarcados.length<9){
				JogadaMaquina('vezD');
			}else{
				console.log("Cabou!");
			}	
		}
	</script>
</html>