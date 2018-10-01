$('#dialog-new-ticket').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
  var id = button.data('userid');
  var modal = $(this);

  modal.find('#userid').attr('value', id);
  // modal.find('').attr('', );
  // modal.find('').attr('', );
  // modal.find('').text('');
  // modal.find('').text('');
})

$('#dialog-new-categoria').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
  var id = button.data('userid');
  var modal = $(this);

  modal.find('#userid').attr('value', id);
  // modal.find('').attr('', );
  // modal.find('').attr('', );
  // modal.find('').text('');
  // modal.find('').text('');
})

$('#dialog-edit-categoria').on('show.bs.modal', function (event) {

var button = $(event.relatedTarget);
var id = button.data('id');
var name = button.data('name');
var description = button.data('description');
var status = button.data('status');

var modal = $(this);
modal.find('#name').attr('value', name);
modal.find('#id').attr('value', id);
modal.find('#description').text(description);
modal.find('[value="'+status+'"]').attr('selected', true);
})

$('#dialog-edit-bank').on('show.bs.modal', function (event) {

var button = $(event.relatedTarget);
var id = button.data('id');
var name = button.data('name');
var agency = button.data('agency');
var code = button.data('code');
var account = button.data('account');

var modal = $(this);
modal.find('#name').attr('value', name);
modal.find('#id').attr('value', id);
modal.find('#agency').attr('value', agency);
modal.find('#account').attr('value', account);
modal.find('#code').attr('value', code);
})

$('#dialog-delete-categoria').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget);
  var id = button.data('id');
  var nome = button.data('name');

  var modal = $(this);
  modal.find('#titlemodel').text('Confirmar exclusão');
  modal.find('#modeltext').text('Deseja realmente excluir a categoria ' + nome + '?');
  modal.find('#confirm').attr('href', 'http://localhost/admin/visao/controleCategoria.php?action=delete&id='+id);
})

$('#dialog-delete-bank').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget);
  var id = button.data('id');
  var name = button.data('name');

  var modal = $(this);
  modal.find('#titlemodel').text('Confirmar exclusão');
  modal.find('#modeltext').text('Deseja realmente excluir o banco ' + name + '?');
  modal.find('#confirm').attr('href', 'http://localhost/admin/visao/controleBanco.php?action=delete&id='+id);
})

$('#dialog-see-ticket').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
  var message = button.data('message');
  var date_sent = button.data('datesent');
  var title = button.data('title');
  var user = button.data('user');
  var modal = $(this);

  modal.find('#message').text(message);
  modal.find('#title').text(title);
  modal.find('#user').text(user);
  modal.find('#date_sent').text(date_sent);
})

$('#dialog-delete-ticket').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget);
  var id = button.data('id');
  var nome = button.data('name');

  var modal = $(this);
  modal.find('#titlemodel').text('Confirmar exclusão');
  modal.find('#modeltext').text('Deseja realmente excluir o ticket ' + nome + '?');
  modal.find('#confirm').attr('href', 'http://localhost/admin/visao/controleTicket.php?action=delete&id='+id);
})

$('#dialog-delete-cidade').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget);
  var id = button.data('id');
  var cidade = button.data('nome');

  var modal = $(this);
  modal.find('#titlemodel').text('Confirmar exclusão');
  modal.find('#modeltext').text('Deseja realmente excluir a cidade ' + cidade + '?');
  modal.find('#confirm').attr('href', 'http://localhost/admin/visao/controleCidade.php?action=delete&id='+id);
})

$('#dialog-delete-user').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget);
  var id = button.data('id');
  var usuario = button.data('nome');

  var modal = $(this);
  modal.find('#titlemodel').text('Confirmar exclusão');
  modal.find('#modeltext').text('Deseja realmente excluir o usuário ' + usuario + '?');
  modal.find('#confirm').attr('href', 'http://localhost/admin/visao/controleUsuario.php?action=delete&id='+id);
})

$('#dialog-delete-pessoa').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget);
  var id = button.data('id');
  var pessoa = button.data('nome');

  var modal = $(this);
  modal.find('#titlemodel').text('Confirmar exclusão');
  modal.find('#modeltext').text('Deseja realmente excluir a pessoa ' + pessoa + '?');
  modal.find('#confirm').attr('href', 'http://localhost/admin/visao/controlePessoa.php?action=delete&id='+id);
})

$('#dialog-edit-cidade').on('show.bs.modal', function (event) {

var button = $(event.relatedTarget);
var id = button.data('cidadeid');
var cidade = button.data('cidadenome');
var id_estado = button.data('idestado');
var nomestado = button.data('cidadeestado');

var modal = $(this);
modal.find('#nome').attr('value', cidade);
modal.find('#id').attr('value', id);
modal.find('[value="'+id_estado+'"]').attr('selected', true);
})

$('#dialog-edit-estado').on('show.bs.modal', function (event) {

var button = $(event.relatedTarget);
var id = button.data('estid');
var nome = button.data('estnome');
var sigla = button.data('estsigla');

var modal = $(this);
modal.find('#nome').attr('value', nome);
modal.find('#sigla').attr('value', sigla);
modal.find('#id').attr('value', id);
})

$('#dialog-edit-pessoa').on('show.bs.modal', function (event) {

var button = $(event.relatedTarget);
var id = button.data('id');
var nome = button.data('nome');
var sexo = button.data('sexo');
var dnascimento = button.data('nascimento');
var cidade_id = button.data('cidade_id');
var cpf = button.data('cpf');
var rg = button.data('rg');
var status = button.data('status');

var modal = $(this);
modal.find('#nome').attr('value', nome);
modal.find('#cpf').attr('value', cpf);
modal.find('#rg').attr('value', rg);
modal.find('#data_nascimento').attr('value', dnascimento);
modal.find('#id').attr('value', id);
modal.find('[value="'+cidade_id+'"]').attr('selected', true);

if (sexo == "F") {
  modal.find('[value="F"]').attr('selected', true);
}else{
  modal.find('[value="M"]').attr('selected', true);
}

if (status == "1"){
  modal.find('[value="1"]').attr('selected', true);
}else{
  modal.find('[value="0"]').attr('selected', true);
}
})

$('#dialog-delete-estado').on('show.bs.modal', function (event) {

var button = $(event.relatedTarget);
var id = button.data('id');
var nome = button.data('nome');

var modal = $(this);
modal.find('#titlemodel').text('Confirmar exclusão');
modal.find('#modeltext').text('Deseja realmente excluir ' + nome + '?');
modal.find('#confirm').attr('href', 'http://localhost/admin/visao/controleEstado.php?action=delete&id='+id);
})


$('#dialog-edit-usuario').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
  var id = button.data('uid');
  var login = button.data('ulogin');
  var email = button.data('uemail');
  var status = button.data('ustatus');
  var saldo = button.data('usaldo');
  var tipo = button.data('utipo');
  var pessoaid = button.data('upessoa');
  var modal = $(this);

  modal.find('#login').attr('value', login);
  modal.find('#email').attr('value', email);
  modal.find('#tipo').attr('value', tipo);
  modal.find('#id').attr('value', id);
  modal.find('[value="'+pessoaid+'"]').attr('selected', true);
  modal.find('[value="'+status+'"]').attr('selected', true);
  modal.find('[value="'+tipo+'"]').attr('selected', true);
  // modal.find('').attr('', );
  // modal.find('').attr('', );
  // modal.find('').text('');
  // modal.find('').text('');
})
