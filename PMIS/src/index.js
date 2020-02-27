const express = require('express')
const path = require('path')
const morgan = require('morgan')
const methodOverride = require('method-override')
const session = require('express-session')
const passport = require('passport');


//INIT
const app = express()
require('./database')

// SETTINGS
app.set('port', process.env.PORT || 4000)
app.set('views', path.join(__dirname, 'views'))
app.set('view engine', 'ejs')


// MIDDLEWARES
app.use(morgan('combined'))
app.use(express.urlencoded({ extended: false }))
app.use(methodOverride('_method'))
// SESSION CONFIG
app.use(session({
    secret: 'mySecretApp',
    resave: true,
    saveUninitialized: true
}))
app.use(passport.initialize());
app.use(passport.session());



// ROUTES
app.use(require('./routes'))
app.use(require('./routes/user'))
app.use(require('./routes/variable'))
app.use(require('./routes/group'))
app.use(require('./routes/form'))

// try for a more friendly view
app.use(require('./routes/dsg'))



// STATIC FILES
app.use('/public', express.static(path.join(__dirname, 'public')))

//SERVER
app.listen(app.get('port'), () => {
    console.log("SERVER RUN!!!", app.get('port'))
})