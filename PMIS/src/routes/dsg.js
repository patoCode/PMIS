const router = require('express').Router()
var dsg = require('../controllers/dsgController')

router.get('/dsg/list', dsg.list)




module.exports = router