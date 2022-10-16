<h1>Cadastro </h1>
<form action="?controller=client&action=registerView" method="post">

    <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" class="form-control" name="name" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" required>
    </div>
    
    <div class="form-group">
        <label for="phone">Telefone</label>
        <input type="text" class="form-control" name="phone">
    </div>
    <br>
    <div class="form-check">
        <div class="radio">
            <label><input type="radio" name="gender" value="feminino" checked>Feminino</label>
        </div>
        <div class="radio">
            <label><input type="radio" name="gender" value="masculino" >Masculino</label>
        </div>
        <div class="radio">
            <label><input type="radio" name="gender" value="outro" disable>Outro</label>
        </div> 
    </div>       
    <br>                 	  
    <div class="checkbox">
        <label>
            <input type="checkbox" name="accept"> Desejo receber os comunicados do site.
        </label>
    </div>
    <br>
    <button type='submit' class="btn btn-primary">Enviar</button>
</form>    