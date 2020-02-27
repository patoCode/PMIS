
varStatic = {}


varStatic.menu = [
    {
        id_privilegio: '1',
        privilegio: 'Administrar Variable',
        route: '/variable/list'
    },
    {
        id_privilegio: '2',
        privilegio: 'Administrar Grupo',
        route: '/group/list'
    },
    {
        id_privilegio: '3',
        privilegio: 'Administrar Fromulario',
        route: '/form/list'
    }
]

varStatic.user =
    {
        username: 'rsanchez',
        email: 'rsanchez@ende.bo',
        nombre: 'Ramiro',
        apellido_pat: 'Sanchez',
        apellido_mat: null,
        fullname: 'Ramiro Sanchez '
    }

module.exports = varStatic