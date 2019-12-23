$(document)
  .ready(function() {
    $('.ui.form')
      .form({
        fields: {
          email: {
            identifier  : 'email',
            rules: [
              {
                type   : 'empty',
                prompt : 'Este campo nao deve estar vazio!'
              },
              {
                type   : 'email',
                prompt : 'Insira um e-mail valido'
              }
            ]
          },
          password: {
            identifier  : 'password',
            rules: [
              {
                type   : 'empty',
                prompt : 'Este campo nao deve estar vazio'
              },
              {
                type   : 'length[6]',
                prompt : 'A senha deve ter no minimo 6 caracteres'
              }
            ]
          }
        }
      })
    ;
  })
;
