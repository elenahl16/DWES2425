//cargar configuracion jwt
const servicioJMT=require('../service/jwt');

//implementar funcion del middelware
function comprobarAuth(req,res,next){

    try {
        //comprobamos que la peticion trae el token
        if(!req.headers.authorization){
            return res.status(403).send('No se envía token');

        }
        const resultado = servicioJMT.verificarToken(req.headers.authorization)
        console.log(resultado);

        //añadimos a los datos de peticion (req) el playload
        req.datosUS = resultado;
        next();

    } catch (error) {
        return res.status(500).send(error);
    }

    
}
module.exports = {comprobarAuth};