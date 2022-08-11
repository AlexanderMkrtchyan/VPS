const {PeerServer}  = require('peer');
const fs = require('fs');




// const privateKey = fs.readFileSync('/etc/letsencrypt/live/quigleyshores.com/privkey.pem', 'utf8')
// const certificate = fs.readFileSync('/etc/letsencrypt/live/quigleyshores.com/cert.pem', 'utf8')
// const chain = fs.readFileSync('/etc/letsencrypt/live/quigleyshores.com/chain.pem')
// const credentials = {
//     key: privateKey, 
//     cert: certificate,
//     ca: chain
// }

const peerServer = PeerServer({
  port: 3001,
});
peerServer.on('error', console.log);
peerServer.on('connection', () =>{console.log('Peer is connected')})