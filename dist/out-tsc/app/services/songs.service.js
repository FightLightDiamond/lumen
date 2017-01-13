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
 * Created by e on 1/5/17.
 */
import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
/**
 * Config
 */
import { BASE_URL } from '../config/app.config';
var SongService = (function () {
    function SongService(_http) {
        this._http = _http;
        this.searchWithSingerUrl = 'songs/search-with-singer';
    }
    SongService.prototype.SearchWithSinger = function (params) {
        if (params === void 0) { params = ''; }
        var url = BASE_URL + this.searchWithSingerUrl + params;
        return this._http.get(url)
            .map(function (res) { return res.json(); });
    };
    return SongService;
}());
SongService = __decorate([
    Injectable(),
    __metadata("design:paramtypes", [Http])
], SongService);
export { SongService };
//# sourceMappingURL=/var/www/html/lumen-api/quickstart-master/app/services/songs.service.js.map