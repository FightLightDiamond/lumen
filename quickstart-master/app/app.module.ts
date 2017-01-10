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
import {FormsModule} from '@angular/forms';
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
/**
 * Validate
 */
//import {CustomFormsModule} from 'ng2-validation'

@NgModule({
  imports:      [
      BrowserModule,
      FormsModule,
      HttpModule,
      appRoutes,
      //CustomFormsModule,
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
