var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};
import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
/**
 * Component
 */
import { AppComponent } from './app.component';
import { u10Component } from './components/u10.component';
import { u11Component } from './components/u11.component';
import { u14Component } from './components/u14.component';
import { u15Component } from './components/u15.component';
import { EmployeeListComponent } from './components/employee.component';
import { EmployeeDetailComponent } from './components/employee-detail.component';
import { HomeComponent } from './components/home.component';
import { NotFoundComponent } from './components/notfound.component';
import { EmployeeOverviewComponent } from './components/employee-overview.component';
import { EmployeeProjectComponent } from './components/employee-project.component';
import { LoginComponent } from './components/auth/login.component';
import { AllWeekChartsComponent } from './components/charts/all-week.component';
import { WeekTypeChartsComponent } from './components/charts/week-type.component';
/**
 * End Compnent
 */
import { ExponentialStrengthPipe } from './pipes/exponential-strength.pipe';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { HttpModule } from '@angular/http';
/**
 * Service
 */
import { EmployeeService } from './services/employee.service';
import { ChartsService } from './services/charts.service';
import { SongService } from './services/songs.service';
import { VideoService } from './services/video.service';
import { AlbumService } from './services/album.service';
/**
 * Routing
 */
import { appRoutes } from './routes/app.route';
import { LoginService } from "./services/auth/login.service";
import { CheckLoginGuard } from "./guards/check-login.guard";
import { CheckSaveFormGuard } from "./guards/check-save-form.guard";
import { RegisterComponent } from "./components/auth/register.component";
/**
 * Validate
 */
//import {CustomFormsModule} from 'ng2-validation'
// import {VgCoreModule} from 'videogular2/core';
// import {VgControlsModule} from 'videogular2/controls';
// import {VgOverlayPlayModule} from 'videogular2/overlay-play';
// import {VgBufferingModule} from 'videogular2/buffering';
import { VideoComponent } from "./components/entertainments/videos.component";
var AppModule = (function () {
    function AppModule() {
    }
    return AppModule;
}());
AppModule = __decorate([
    NgModule({
        imports: [
            BrowserModule,
            FormsModule,
            HttpModule,
            appRoutes,
            ReactiveFormsModule,
        ],
        declarations: [
            AppComponent,
            u10Component,
            u11Component,
            u14Component,
            u15Component,
            ExponentialStrengthPipe,
            EmployeeListComponent,
            EmployeeOverviewComponent,
            EmployeeProjectComponent,
            AllWeekChartsComponent,
            WeekTypeChartsComponent,
            EmployeeDetailComponent,
            HomeComponent,
            NotFoundComponent,
            LoginComponent,
            RegisterComponent,
            VideoComponent
        ],
        providers: [
            EmployeeService,
            ChartsService,
            SongService,
            VideoService,
            AlbumService,
            LoginService,
            CheckLoginGuard,
            CheckSaveFormGuard
        ],
        bootstrap: [AppComponent]
    }),
    __metadata("design:paramtypes", [])
], AppModule);
export { AppModule };
//# sourceMappingURL=/var/www/html/lumen-api/quickstart-master/app/app.module.js.map