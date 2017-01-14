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
import { Component } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import { ChartsService } from '../../services/charts.service';
import { SongService } from '../../services/songs.service';
import { VideoService } from '../../services/video.service';
import { AlbumService } from '../../services/album.service';
var WeekTypeChartsComponent = (function () {
    function WeekTypeChartsComponent(route, activatedRoute, chartsService, songService, videoService, albumService) {
        this.route = route;
        this.activatedRoute = activatedRoute;
        this.chartsService = chartsService;
        this.songService = songService;
        this.videoService = videoService;
        this.albumService = albumService;
        this.typeNames = { 1: 'song', 2: 'video', 3: 'album' };
        this.areaNames = { 1: 'VN', 2: 'ASIA', 3: 'U.S.UK' };
        this.active = false;
    }
    WeekTypeChartsComponent.prototype.ngOnInit = function () {
        var _this = this;
        this.subscription = this.activatedRoute
            .params
            .subscribe(function (params) {
            _this._week = params['week'];
            _this._type = params['type'];
            _this.typeName = _this.typeNames[params['type']];
            _this.getByWeekAndType();
            _this.disableLink();
            _this.resetItems();
        });
    };
    WeekTypeChartsComponent.prototype.resetItems = function () {
        this.items = [];
    };
    WeekTypeChartsComponent.prototype.getByWeekAndType = function () {
        var _this = this;
        this.chartsService.GetWeekAndType(this._week, this._type)
            .subscribe(function (data) {
            _this.charts = [];
            _this.charts.push(data.slice(0, 10));
            _this.charts.push(data.slice(10, 20));
            _this.charts.push(data.slice(20, 30));
            console.log(_this.charts);
        });
    };
    WeekTypeChartsComponent.prototype.disableLink = function () {
        this.disabled = {
            1: false,
            2: false,
            3: false
        };
        this.disabled[this._type] = 'disabled';
    };
    WeekTypeChartsComponent.prototype.getItemChart = function (chartsId, areaKey) {
        this.chartsId = chartsId;
        this.areaKey = areaKey;
    };
    WeekTypeChartsComponent.prototype.selectedItemChart = function (areaNo, areaKey, chartsId) {
        this.areaNo = areaNo;
        this.areaKey = areaKey;
        this.chartsId = chartsId;
    };
    WeekTypeChartsComponent.prototype.updateChart = function (formData) {
        var _this = this;
        this.chartsService.update(this.chartsId, formData)
            .subscribe(function (data) {
            if (data) {
                _this.charts[_this.areaNo][_this.areaKey].item = _this.items[_this.itemKey];
                _this.charts[_this.areaNo][_this.areaKey].item_id = _this.items[_this.itemKey].id;
                console.log(data);
            }
        });
    };
    WeekTypeChartsComponent.prototype.searchItem = function (e) {
        var _this = this;
        if (e.which == 13) {
            if (this._type == 1) {
                this.songService.SearchWithSinger()
                    .subscribe(function (data) {
                    _this.items = data['data'];
                });
            }
            else if (this._type == 2) {
                this.videoService.SearchWithSinger()
                    .subscribe(function (data) {
                    _this.items = data['data'];
                });
            }
            else if (this._type == 3) {
                this.albumService.SearchWithSinger()
                    .subscribe(function (data) {
                    _this.items = data['data'];
                });
            }
            else {
                alert('Hệ thống đang bị Hacker tấn công vui lòng thông báo kỹ thuật viên');
            }
        }
    };
    WeekTypeChartsComponent.prototype.rememberSelectedItem = function (itemKey) {
        this.itemKey = itemKey;
    };
    return WeekTypeChartsComponent;
}());
WeekTypeChartsComponent = __decorate([
    Component({
        selector: 'week-type-charts',
        templateUrl: 'app/templates/charts/week-type.component.html',
        styleUrls: [
            'app/styles/charts/week-type.component.css'
        ]
    }),
    __metadata("design:paramtypes", [Router,
        ActivatedRoute,
        ChartsService,
        SongService,
        VideoService,
        AlbumService])
], WeekTypeChartsComponent);
export { WeekTypeChartsComponent };
//# sourceMappingURL=/var/www/html/lumen-api/quickstart-master/app/components/charts/week-type.component.js.map