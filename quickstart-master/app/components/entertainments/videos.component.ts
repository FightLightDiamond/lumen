/**
 * Created by e on 1/12/17.
 */
import {Component} from "@angular/core";
@Component({
    selector: 'index-video',
    templateUrl: 'app/templates/entertainments/videos.component.html'
})

export class VideoComponent {
    sources:Array<Object>;

    constructor() {
        this.sources = [
            {
                src: "http://keengmp3obj.1d2173fe.viettel-cdn.vn/bucket-media-keeng/sata07/video/2017/01/06/hgPLtlVTKDcS1fejBD1E586eff02e1896.mp4",
                type: "video/mp4"
            },
            // {
            //     src: "http://keengmp3obj.1d2173fe.viettel-cdn.vn/bucket-media-keeng/sata07/video/2017/01/06/hgPLtlVTKDcS1fejBD1E586eff02e1896.mp4",
            //     type: "video/mp4"
            // },
            /*{
                src: "http://static.videogular.com/assets/videos/videogular.ogg",
                type: "video/ogg"
            },
            {
                src: "http://static.videogular.com/assets/videos/videogular.webm",
                type: "video/webm"
            }*/
        ];
    }
}