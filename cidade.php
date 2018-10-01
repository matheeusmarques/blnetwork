<?php
// includes
include "header.php";
include "inc/modal_cidade.php";


// requires
require_once "DAO/DAOCidade.php";
require_once "modelo/Cidade.php";
require_once "DAO/mySQL.class.php";

$daoCidade = new DAOCidade();
$listaCidades = $daoCidade->selectAll();
?>
        <!-- page content -->
        <body>
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Lista de Cidades</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="btn-group" style="float: right; padding-right: 30px;">
                    <button type="button"
                    data-target="#dialog-new-cidade"
                    data-toggle="modal"
                    data-userid="<?php echo $_SESSION['id'];?>"
                    class="btn btn-round btn-primary">Nova Cidade</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_content">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                             <div class="x_panel">
                               <div class="x_content">
                                 <div class="table-responsive">
                                   <table class="table table-striped jambo_table bulk_action">
                                     <thead>
                                       <tr class="headings">
                                         <th>
                                           <input type="checkbox" id="check-all" class="flat">
                                         </th>
                                         <th class="column-title">Nome </th>
                                         <th class="column-title">Estado</th>
                                         <th class="column-title no-link last"><span class="nobr">Ação</span>
                                         </th>
                                         <th class="bulk-actions" colspan="7">
                                           <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                         </th>
                                       </tr>
                                     </thead>

                                     <tbody>
                                       <?php
                                       foreach ($listaCidades as $cidade) {
                                        echo '<tr class="even pointer">';
                                          echo '<td class="a-center ">';
                                            echo '<input type="checkbox" class="flat" name="table_records">';
                                          echo '</td>';
                                          echo '<td class=" ">'.$cidade->getNome().'</td>';
                                          echo ' <td class=" ">'.$daoCidade->queryConverterEstado($cidade->getIdEstado()).'</td>';
                                          //echo '<td class=" last"><a href="http://localhost/admin/visao/removerEstado.php?id='.$est->getID().'">Deletar</a>';
                                          echo '<td class=" last">                    <div class="btn-group">
                    <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm" type="button" aria-expanded="false">Ações <span class="caret"></span>
                    </button>
                    <ul role="menu" class="dropdown-menu">
                      <li>
                          <a href="#" data-toggle="modal"
                          data-cidadeestado="'.$daoCidade->queryConverterEstado($cidade->getIdEstado()).'"
                          data-idestado="'.$cidade->getIdEstado().'"
                          data-cidadenome="'.$cidade->getNome().'"
                          data-cidadeid="'.$cidade->getID().'"
                          data-target="#dialog-edit-cidade"
                          >Alterar</a>
                      </li>
                      <li>
                          <a href="#"
                          data-toggle="modal"
                          data-nome="'.$cidade->getNome().'"
                          data-id="'.$cidade->getID().'"
                          data-target="#dialog-delete-cidade">Excluir</a>
                      </li>
                    </ul>
                    </div>';
                                          echo '</td>';
                                        echo '</tr>';
                                       }
                                      ?>
                                     </tbody>
                                   </table>
                                   <?php
                                   if(isset($_GET['status'])){
                                     switch ($_GET['status']) {
                                       case 'removed':
                                       echo '<center><div class="alert alert-success alert-dismissible fade in" role="alert">
                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                 </button>
                                 <strong>Removido com sucesso!</strong>
                               </div></center>';
                                         break;

                                         case 'error':
                                         echo '<center><div class="alert alert-danger alert-dismissible fade in" role="alert">
                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                 </button>
                                 <strong>Houve um erro ao adicionar. Tente novamente!</strong>
                               </div></center>';
                                         break;

                                         case 'updated':
                                         echo '<center><div class="alert alert-success alert-dismissible fade in" role="alert">
                                   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                   </button>
                                   <strong>Atualizado com sucesso!</strong>
                                 </div></center>';
                                           break;

                                           case 'add':
                                           echo '<center><div class="alert alert-success alert-dismissible fade in" role="alert">
                                     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                     </button>
                                     <strong>Adicionado com sucesso!</strong>
                                   </div></center>';
                                             break;

                                       default:
                                         // code...
                                         break;
                                     }

                                   } ?>
                                 </div>


                               </div>
                             </div>
                </div>
              </div>
            </div>
            </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
<?php
  include_once "footer.php";
?>
