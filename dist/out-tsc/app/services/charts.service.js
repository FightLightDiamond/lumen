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
 * Created by e on 1/4/17.
 */
import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
/**
 * Config
 */
import { BASE_URL } from '../config/app.config';
var ChartsService = (function () {
    function ChartsService(_http) {
        this._http = _http;
        this.getAllWeekUrl = 'charts/list-week/';
        this.getWeekAndType = 'charts/items-by-week-and-type/';
        this.createNewWeekUrl = 'charts/';
        this.updateUrl = 'charts/';
        this.getActuallyUrl = 'charts/actually';
        this.activeUrl = 'charts/active';
    }
    ChartsService.prototype.GetAllWeek = function () {
        var url = BASE_URL + this.getAllWeekUrl;
        return this._http.get(url)
            .map(function (res) { return res.json(); });
    };
    ChartsService.prototype.CreateNewWeek = function () {
        var url = BASE_URL + this.createNewWeekUrl;
        return this._http.get(url)
            .map(function (res) { return res.json(); });
    };
    ChartsService.prototype.GetWeekAndType = function (week, type) {
        var url = BASE_URL + this.getWeekAndType + week + '/' + type;
        return this._http.get(url)
            .map(function (res) { return res.json(); });
    };
    ChartsService.prototype.update = function (id, data) {
        var url = BASE_URL + this.updateUrl + id;
        return this._http.put(url, data)
            .map(function (res) { return res.json(); });
    };
    ChartsService.prototype.GetActually = function () {
        var url = BASE_URL + this.getActuallyUrl;
        return this._http.get(url)
            .map(function (res) { return res.json(); });
    };
    ChartsService.prototype.SetActive = function (data) {
        var url = BASE_URL + this.activeUrl;
        return this._http.post(url, data)
            .map(function (res) { return res.json(); });
    };
    return ChartsService;
}());
ChartsService = __decorate([
    Injectable(),
    __metadata("design:paramtypes", [Http])
], ChartsService);
export { ChartsService };
//# sourceMappingURL=/var/www/html/lumen-api/quickstart-master/app/services/charts.service.js.map