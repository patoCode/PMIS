var dsgService = require('../services/dsgService')
var {menu, user} = require('../config/static.config')


const dsg = {}
const session = {};
session.user = user
session.menu = menu

dsg.list = (req, res) => {
    //TODO GET MENU OFF SESSION
    dsgService.loadForm((data, err) =>{
        if (err) {
            console.error('Error al recuperar los dsgs')
        } else {
            session.list = data.list
            res.render('designer/layout', {session, title: "Lista de dsgs", smallLegend: 'Pequeña descripcion de la pantalla', })
            //res.render('user/list', {users: users.list})
        }
    })
}

dsg.create = (req, res) => {
    dsgService.create(req.body, (_data, err) =>{
        if (err) {
            console.error('Error al recuperar los dsgs')
        } else {
            res.redirect('/dsg/list')
            //res.render('user/list', {users: users.list})
        }
    })
}

dsg.addGroup = (req, res) => {
    dsgService.addGroup(req.body, (_data, err) =>{
        if (err) {
            console.error('Error al recuperar los dsgs')
        } else {
            res.redirect('/dsg/list')
        }
    })
}



module.exports = dsg