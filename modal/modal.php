<!-- Modal Update servidor-->
<div class="modal fade" id="update-servidor" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="update.php" method="post" id="incluir">
      	<div class="modal-header table-secondary">
           <p class="h3">Servidor</p>
           <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body table-secondary">
        <input class="input-group mb-3" type="hidden" name="id" id="id" value="" />
            <tr class="table-secondary"><td>Nome</td>
            <td><input class="form-control" type="text" name="novoNome" id="nome" required value="" /></td></tr>
            <tr class="table-secondary"><td>E-mail</td>
                <td>
                  <input class="form-control" type="email" name="novoEmail" id="email" required value="" />
                </td>
              </tr>
            <tr class="table-secondary"><td>TRT</td>
            <td><input class="form-control" type="number" name="novoTrt" required id="trt" min="1" max="24" value="" /></td></tr>
        </div>
        <div class="modal-footer table-secondary">
          <tr class="table-secondary"><td colspan="2"><button class="btn btn-secondary">Editar</button>
          <input type="button" class="btn btn-secondary" name="button" id="button" value="Voltar" data-dismiss="modal" /></td></tr>
          </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Update usuario-->
<div class="modal fade" id="update-usuario" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="updateUsuario.php" method="post" id="incluir">
        <div class="modal-header table-secondary">
           <p class="h3">Usuário</p>
           <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body table-secondary">
        <input class="input-group mb-3" type="hidden" name="id" value="" id="idUsuario" />
            <tr class="table-secondary"><td>Nome</td>
            <td><input class="form-control" type="text" name="novoNome" id="nomeUsuario" value="" required /></td></tr>
            <tr class="table-secondary"><td>E-mail</td>
                <td>
                  <input class="form-control" type="email" name="novoEmail" value="" id="emailUsuario" required />
                </td>
              </tr>
            <tr class="table-secondary"><td>Senha</td>
            <td><input class="form-control" type="password" name="novaSenha" id="textfield2" required /></td></tr>  
            <tr class="table-secondary"><td>Perfil</td>
            <td><select class="custom-select" id="inputGroupSelect01" name="novoPerfil" required><option disabled selected>Selecione o perfil</option><option value="A">Administrador</option><option value="T">Tribunal</option></select></td></tr>
        </div>
        <div class="modal-footer table-secondary">
          <tr class="table-secondary"><td colspan="2"><button class="btn btn-secondary">Editar</button>
          <input type="button" class="btn btn-secondary" name="button" id="button" value="Voltar" data-dismiss="modal" /></td></tr>
          </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Update user-->
<div class="modal fade" id="update-user" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="updateUser.php" method="post" id="incluir">
        <div class="modal-header table-primary">
           <p class="h3">Usuário</p>
           <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body table-primary">
        <tr class="table-primary">
            <th scope="col" colspan="2"><p class="h3" id="user">Usuário</p></th>
            <input class="input-group mb-3" type="hidden" name="id" id="idUser" value="" /></tr>
            <tr class="table-primary"><td>Email</td>
            <td><input class="form-control" type="email" name="novoEmail" id="emailUser" required value="" /></td></tr>
            <tr class="table-primary"><td>Nome</td>
            <td><input class="form-control" type="text" name="novoNome" id="nomeUser" required value="" /></td></tr>
            <tr class="table-primary"><td>Digite sua senha anterior</td>
            <td><input class="form-control" type="password" name="senha" id="textfield2" required /></td></tr>
            <tr class="table-primary"><td>Nova Senha</td>
            <td><input class="form-control" type="password" name="novaSenha" id="textfield2" required /></td></tr>
        </div>
        <div class="modal-footer table-primary">
          <tr class="table-primary"><td colspan="2"><button class="btn btn-primary">Editar</button>
          <input type="button" class="btn btn-primary" name="button" id="button" value="Voltar" data-dismiss="modal" /></td></tr>
          </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal excluir servidor-->
                            <div class="modal fade" id="excluir" role="dialog">
                              <div class="modal-dialog">
                              
                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">Excluir Servidor?</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  </div>
                                  <div class="modal-body">
                                    <p>Deseja excluir este contato?</p>
                                  </div>
                                  <div class="modal-footer">
                                    <a href="" id="getIDServidor"><button type="submit" class="btn btn-danger">Sim</button></a>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
                                  </div>
                                </div>
                                
                              </div>
                            </div>

<!-- Modal excluir usuario-->
                            <div class="modal fade" id="exclr" role="dialog">
                              <div class="modal-dialog">
                              
                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">Excluir Usuário?</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  </div>
                                  <div class="modal-body">
                                    <p>Deseja excluir este contato?</p>
                                  </div>
                                  <div class="modal-footer">
                                    <a href="" id="getIDUsuario"><button type="submit" class="btn btn-danger">Sim</button></a>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
                                  </div>
                                </div>
                                
                              </div>
                            </div>

<!-- Modal incluir servidor -->
<div class="modal fade" id="incluir-servidor" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="dados.php" method="post" id="incluir">
        <div class="modal-header table-info">
           <p class="h3">Cadastrar Servidor</p>
           <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body table-info">
            <tr class="table-info"><td>Nome</td>
            <td><input class="form-control" type="text" name="nome" required id="textfield" /></td></tr>
            <tr class="table-info"><td>E-mail</td>
                <td>
                  <div class="check-email">
                    <input class="form-control email servidor" type="email" name="email" autocomplete="off" required id="email" placeholder="exemplo@email.com"/>
                  </div>
                </td>
              </tr>
            <tr class="table-info"><td>TRT</td>
            <td><input class="form-control" type="number" name="trt" required id="number_format" min="1" max="24" /></td></tr>
        </div>
        <div class="modal-footer table-info">
          <tr class="table-info"><td colspan="2"><button class="btn btn-info">Cadastrar</button>
          <input type="button" class="btn btn-info" name="button" id="button" value="Voltar" data-dismiss="modal" /></td></tr>
          </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal incluir usuario -->
<div class="modal fade" id="incluir-usuario" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="dadosUsuario.php" method="post" id="incluir">
        <div class="modal-header table-success">
           <p class="h3">Cadastrar Usuário</p>
           <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body table-success">
            <tr class="table-success"><td>Nome</td>
            <td><input class="form-control" type="text" name="nome" required id="textfield" /></td></tr>
            <tr class="table-success"><td>E-mail</td>
                <td>
                  <div class="check-email">
                    <input class="form-control email usuario" type="email" name="email" autocomplete="off" required id="email" placeholder="exemplo@email.com"/>
                  </div>
                </td>
              </tr>
            <tr class="table-success"><td>Senha</td>
            <td><input class="form-control" type="password" name="senha" required placeholder="Digite uma senha" /></td></tr>
            <tr class="table-success"><td>Perfil</td>
            <td><select class="custom-select" id="inputGroupSelect01" name="perfil" required><option disabled selected>Selecione o perfil</option><option value="A">Administrador</option><option value="T">Tribunal</option></select></td></tr>
        </div>
        <div class="modal-footer table-success">
          <tr class="table-success"><button class="btn btn-success">Cadastrar</button>
          <input type="button" class="btn btn-success" name="button" id="button" value="Voltar" data-dismiss="modal" /></tr>
          </div>
      </form>
    </div>
  </div>
</div>
