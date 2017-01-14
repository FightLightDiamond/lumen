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
 * Created by e on 1/6/17.
 */
import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
/**
 * Config
 */
import { BASE_URL } from '../config/app.config';
var AlbumService = (function () {
    function AlbumService(_http) {
        this._http = _http;
        this.searchWithSingerUrl = 'albums/search-with-singer';
    }
    AlbumService.prototype.SearchWithSinger = function (params) {
        if (params === void 0) { params = ''; }
        return this._http.get(BASE_URL + this.searchWithSingerUrl + params)
            .map(function (res) { return res.json(); });
    };
    return AlbumService;
}());
AlbumService = __decorate([
    Injectable(),
    __metadata("design:paramtypes", [Http])
], AlbumService);
export { AlbumService };
//# sourceMappingURL=/var/www/html/lumen-api/quickstart-master/app/services/album.service.js.map