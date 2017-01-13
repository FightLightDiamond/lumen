import {NgModule}      from '@angular/core';
import {BrowserModule} from '@angular/platform-browser';
/**
 * Component
 */
import {AppComponent} from './app.component';
import {u10Component} from  './components/u10.component';
import {u11Component} from  './components/u11.component';
import {u14Component} from  './components/u14.component';
import {u15Component} from  './components/u15.component';
import {EmployeeListComponent} from './components/employee.component';
import {EmployeeDetailComponent} from './components/employee-detail.component';
import {HomeComponent} from './components/home.component';
import {NotFoundComponent} from './components/notfound.component';
import {EmployeeOverviewComponent} from './components/employee-overview.component';
import {EmployeeProjectComponent} from './components/employee-project.component';
import {LoginComponent} from './components/auth/login.component';
import {AllWeekChartsComponent} from './components/charts/all-week.component';
import {WeekTypeChartsComponent} from  './components/charts/week-type.component';
/**
 * End Compnent
 */
import {ExponentialStrengthPipe} from  './pipes/exponential-strength.pipe';
import {FormsModule, ReactiveFormsModule} from '@angular/forms';
import {HttpModule} from '@angular/http';
/**
 * Service
 */
import {EmployeeService} from  './services/employee.service'
import {ChartsService} from  './services/charts.service'
import {SongService} from './services/songs.service';
import {VideoService} from './services/video.service';
import {AlbumService} from './services/album.service';
/**
 * Routing
 */
import {appRoutes} from './routes/app.route';
import {LoginService} from "./services/auth/login.service";
import {CheckLoginGuard} from "./guards/check-login.guard";
import {CheckSaveFormGuard} from "./guards/check-save-form.guard";
import {RegisterComponent} from "./components/auth/register.component";
/**
 * Validate
 */
//import {CustomFormsModule} from 'ng2-validation'

// import {VgCoreModule} from 'videogular2/core';
// import {VgControlsModule} from 'videogular2/controls';
// import {VgOverlayPlayModule} from 'videogular2/overlay-play';
// import {VgBufferingModule} from 'videogular2/buffering';
import {VideoComponent} from "./components/entertainments/videos.component";
import {SongComponent} from "./components/entertainments/songs.component";


@NgModule({
  imports:      [
      BrowserModule,
      FormsModule,
      HttpModule,
      appRoutes,
      ReactiveFormsModule,

      // CustomFormsModule,

      // VgCoreModule,
      // VgControlsModule,
      // VgOverlayPlayModule,
      // VgBufferingModule
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
      VideoComponent,
      SongComponent
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
  bootstrap:    [ AppComponent ]
})
export class AppModule {}
