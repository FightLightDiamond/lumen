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
import { Component } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
/**
 * Services
 */
import { ChartsService } from '../../services/charts.service';
import { SongService } from '../../services/songs.service';
import { VideoService } from '../../services/video.service';
import { AlbumService } from '../../services/album.service';
/**
 * Config
 */
import { CHART_NAMES, PAGINATE } from '../../config/charts';
import { error } from '../../config/errors';
// import { CustomFormsModule } from 'ng2-validation'
var AllWeekChartsComponent = (function () {
    function AllWeekChartsComponent(chartsService, songService, videoService, albumService, router, activatedRouter) {
        this.chartsService = chartsService;
        this.songService = songService;
        this.videoService = videoService;
        this.albumService = albumService;
        this.router = router;
        this.activatedRouter = activatedRouter;
        this.areaNames = CHART_NAMES.AREAS;
        this.typeNames = CHART_NAMES.TYPES;
        this.active = false;
        //Paginate
        this.hiddenItemLinks = true;
        this.showPreviousItemLinks = false;
        this.showNextItemLinks = false;
        this.currentPageItemLinks = 1;
        this.pointDefault = 1000;
        this.numberItem = PAGINATE.NUMBER_ITEM;
    }
    AllWeekChartsComponent.prototype.ngOnInit = function () {
        var _this = this;
        this.activatedRouter.queryParams.subscribe(function (params) {
            _this.currentPageItemLinks = params['page'] || 1;
        });
        this.chartsService.GetAllWeek()
            .subscribe(function (res) {
            _this.weeks = res;
        }, function (error) {
            console.log(error);
            console.log("API get all week error!");
        });
        this.getActually();
    };
    AllWeekChartsComponent.prototype.getActually = function () {
        var _this = this;
        this.chartsService.GetActually()
            .subscribe(function (res) {
            _this.buildCharts(res);
            console.log(_this.charts);
        }, function (error) {
            console.log(error);
            console.log("API get actually error");
        });
    };
    AllWeekChartsComponent.prototype.buildCharts = function (res) {
        this.charts = [[], [], []];
        var index = 0;
        var numberItem = this.numberItem;
        for (var i = 1; i <= 9; i++) {
            this.charts[index].push(res.slice(i * numberItem - numberItem, i * numberItem));
            if (i % 3 == 0) {
                ++index;
            }
        }
    };
    AllWeekChartsComponent.prototype.ngOnCreate = function () {
        var _this = this;
        var ok = confirm('You want to create new week ?');
        if (ok) {
            this.chartsService.CreateNewWeek().subscribe(function (res) {
                if (res === true) {
                    var maxWeek = _this.weeks[0];
                    _this.weeks.unshift(++maxWeek);
                    _this.getActually();
                }
            });
        }
    };
    /*
        Process
     */
    AllWeekChartsComponent.prototype.resetItems = function () {
        this.items = [];
    };
    AllWeekChartsComponent.prototype.getItemChart = function (chartsId, rankNo) {
        this.chartsId = chartsId;
        this.rankNo = rankNo;
    };
    AllWeekChartsComponent.prototype.selectedItemChart = function (typeNo, areaNo, rankNo, chartsId) {
        if (this.typeNo != typeNo) {
            this.resetItems();
            this.typeNo = typeNo;
        }
        this.areaNo = areaNo;
        this.rankNo = rankNo;
        this.chartsId = chartsId;
    };
    AllWeekChartsComponent.prototype.updateChart = function (formData) {
        var _this = this;
        this.chartsService.update(this.chartsId, formData)
            .subscribe(function (data) {
            if (data) {
                _this.charts[_this.typeNo][_this.areaNo][_this.rankNo].item = _this.itemRemember;
                _this.charts[_this.typeNo][_this.areaNo][_this.rankNo].item_id = _this.itemRemember;
            }
            else {
                _this.error();
            }
        });
    };
    AllWeekChartsComponent.prototype.searchItem = function (formData, numPage) {
        var _this = this;
        if (numPage === void 0) { numPage = 1; }
        var params = '?name=' + formData.itemName + '& singer_name=' + formData.singerName + '&page=' + numPage;
        if (this.typeNo == 0) {
            this.songService.SearchWithSinger(params)
                .subscribe(function (data) {
                _this.items = data['data'];
                _this.setItemLinks(data);
            });
        }
        else if (this.typeNo == 1) {
            this.videoService.SearchWithSinger(params)
                .subscribe(function (data) {
                _this.items = data['data'];
                _this.setItemLinks(data);
            });
        }
        else if (this.typeNo == 2) {
            this.albumService.SearchWithSinger(params)
                .subscribe(function (data) {
                _this.items = data['data'];
                _this.setItemLinks(data);
            });
        }
        else {
            this.error();
        }
    };
    AllWeekChartsComponent.prototype.setItemLinks = function (data) {
        if (data.to === this.numberItem) {
            this.showNextItemLinks = true;
        }
        else {
            this.showNextItemLinks = false;
        }
        if (data.to < this.numberItem && data.current_page === 1) {
            this.hiddenItemLinks = true;
        }
        else {
            this.hiddenItemLinks = false;
        }
        // alert(data.to);
        // alert(this.showNextItemLinks)
        if (data.current_page === 1) {
            this.showPreviousItemLinks = false;
        }
        else {
            this.showPreviousItemLinks = true;
        }
        this.currentPageItemLinks = data.current_page;
    };
    AllWeekChartsComponent.prototype.rememberSelectedItem = function (itemRemember) {
        this.itemRemember = itemRemember;
    };
    AllWeekChartsComponent.prototype.setActive = function (active) {
        var _this = this;
        var sure = confirm('Are you sure?');
        if (sure) {
            var data = { week: this.weeks[0], is_active: active };
            this.chartsService.SetActive(data)
                .subscribe(function (data) {
                if (data) {
                    _this.active = active;
                }
                else {
                    _this.error();
                }
            });
        }
    };
    AllWeekChartsComponent.prototype.error = function () {
        error();
    };
    return AllWeekChartsComponent;
}());
AllWeekChartsComponent = __decorate([
    Component({
        selector: 'all-week-chart',
        templateUrl: 'app/templates/charts/all-week-chart.component.html',
        styleUrls: [
            'app/styles/validate.css',
            'app/styles/charts/week-type.component.css'
        ],
        providers: [ChartsService, SongService, VideoService, AlbumService],
    }),
    __metadata("design:paramtypes", [ChartsService,
        SongService,
        VideoService,
        AlbumService,
        Router,
        ActivatedRoute])
], AllWeekChartsComponent);
export { AllWeekChartsComponent };
//# sourceMappingURL=/var/www/html/lumen-api/quickstart-master/app/components/charts/all-week.component.js.map