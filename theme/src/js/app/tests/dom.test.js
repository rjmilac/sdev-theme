// import { ZoomMtg } from '@zoomus/websdk';

class DomTest {

    constructor() {

    }

    run() {

        // script window ready// ZoomMtg.setZoomJSLib('https://dmogdx0jrul3u.cloudfront.net/1.4.2/lib', '/av');
        // ZoomMtg.setZoomJSLib('http://localhost:8080/mcca/wp-content/themes/mcca/node_modules/@zoomus', '/av');
        // ZoomMtg.setZoomJSLib('https://source.zoom.us/1.7.2/lib', '/av');
        // ZoomMtg.preLoadWasm();
        // ZoomMtg.prepareJssdk();

        this.meetConfig = {
            apiKey: '7x5xmPrdS9i9Hp_M9tOP-A',
            apiSecret : 'ollU15FzsVJITWgy3Mh3d2olCSJSLCW2Qfax',
            meetingNumber: '87468370504',
            leaveUrl: 'http://localhost:8080/mcca/',
            userName: 'Dev',
            userEmail: 'test.acc4568@gmail.com', // required for webinar
            passWord: '987067', // if required
            role: 0, // 1 for host; 0 for attendee or webinar
            success : (res) => {
                console.log('signature', res.result);
                ZoomMtg.init({
                    debug: true, //optional
                    leaveUrl: 'http://localhost:8080/mcca/', //required
                    success : () => {
                        ZoomMtg.join({
                            meetingNumber: this.meetConfig.meetingNumber,
                            userName: this.meetConfig.userName,
                            userEmail: this.meetConfig.userEmail,
                            passWord: this.meetConfig.passWord,
                            apiKey: this.meetConfig.apiKey,
                            signature: res.result,
                            participantId: 'UUID',
                            success: function(res){console.log(res)},
                            error: function(res){console.log(res)}
                        });
                    }
                });
            }
        };


    }

    runOnLoad() {

        // do tests on window load

        // setTimeout(() => { this.testZoom() }, 10000);

    }
    
    testZoom() {
        this.zoomSignature = ZoomMtg.generateSignature(this.meetConfig);
    }

}

export { DomTest };