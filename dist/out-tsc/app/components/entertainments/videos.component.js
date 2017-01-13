var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};
/**
 * Created by e on 1/12/17.
 */
import { Component } from "@angular/core";
var VideoComponent = (function () {
    function VideoComponent() {
        this.sources = [
            {
                src: "http://keengmp3obj.1d2173fe.viettel-cdn.vn/bucket-media-keeng/sata07/video/2017/01/06/hgPLtlVTKDcS1fejBD1E586eff02e1896.mp4",
                type: "video/mp4"
            },
        ];
    }
    return VideoComponent;
}());
VideoComponent = __decorate([
    Component({
        selector: 'index-video',
        templateUrl: 'app/templates/entertainments/videos.component.html'
    }),
    __metadata("design:paramtypes", [])
], VideoComponent);
export { VideoComponent };
//# sourceMappingURL=/var/www/html/lumen-api/quickstart-master/app/components/entertainments/videos.component.js.map