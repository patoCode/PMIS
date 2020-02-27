var formService = require('../services/formService')
var {menu, user} = require('../config/static.config')


const form = {}
const session = {};
session.user = user
session.menu = menu

form.list = (req, res) => {
    //TODO GET MENU OFF SESSION
    formService.loadForms((data, err) =>{
        if (err) {
            console.error('Error al recuperar los forms')
        } else {
            session.list = data.list
            res.render('form/list', {session, title: "Lista de forms", smallLegend: 'Pequeña descripcion de la pantalla', })
            //res.render('user/list', {users: users.list})
        }
    })
}

form.create = (req, res) => {
    formService.create(req.body, (_data, err) =>{
        if (err) {
            console.error('Error al recuperar los forms')
        } else {
            res.redirect('/form/list')
            //res.render('user/list', {users: users.list})
        }
    })
}

form.addGroup = (req, res) => {
    formService.addGroup(req.body, (_data, err) =>{
        if (err) {
            console.error('Error al recuperar los forms')
        } else {
            res.redirect('/form/list')
        }
    })
}



module.exports = form