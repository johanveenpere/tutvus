<html !DOCTYPE>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mainpage.css"/>
    <link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
    <script
      src="https://code.jquery.com/jquery-3.1.1.min.js"
      crossorigin="anonymous"></script>
    <script src="semantic/dist/semantic.min.js"></script>
</head>
<body>
 <div class="container">
	<div class="header">
		<div class="headcontainer">
			<p class="greeting">Tere tulemast, Jon</p>
			<p class="co-lunch">CO-LUNCH</p>
		</div>
	</div>       
        <div class="sisucontainer" style"height=800px;">
            <div class="parempool">
					<div class="ui selection dropdown">		
						<div class="default text">Restoran</div>
						<div class="menu">
							<div class="item" data-value="1">Restoran 1</div>
							<div class="item" data-value="0">Restoran 2</div>
						</div>
					</div></br>
					<script>$('.ui.dropdown')
						.dropdown();</script>			
					<div class="ui right labeled input">
						<input type="text">
						<div class="ui basic label">
							Tund
						</div>
					</div>
					<div class="ui right labeled input">
						<input type="text">
						<div class="ui basic label">
							Minut
						</div>
					</div>
			</div>
            <div class="vasakpool">
				<h3>Lounasoogi pakkumised</h3>
				<div class="ui raised segment">	
					<p>Rida 1</p>
					<p>Rida 2</p>					
					<p>Rida 3</p>
					<p>Rida 4</p>
					<button class="positive ui button">NÕUSTU</button>	
				</div>
				
				<div class="ui raised segment">
					<p>Rida 1</p>
					<p>Rida 2</p>
					<p>Rida 3</p>
					<p>Rida 4</p>
					<button class="positive ui button">NÕUSTU</button>			
				</div>
				<div class="ui raised segment">
					<p>Rida 1</p>
					<p>Rida 2</p>
					<p>Rida 3</p>
					<p>Rida 4</p>
					<button class="positive ui button">NÕUSTU</button>						
				</div>
            </div>   
        </div>

</div>
    
</body>

</html> 

