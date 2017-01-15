import {NgModule}      from '@angular/core';
import {BrowserModule} from '@angular/platform-browser';
/**
 * Component
 */
import {AppComponent} from './app.component';
import {HomeComponent} from './components/home.component';
import {NotFoundComponent} from './components/notfound.component';
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
//import {NgUploaderModule} from "ngx-uploader";


@NgModule({
  imports:      [
      BrowserModule,
      FormsModule,
      HttpModule,
      appRoutes,
      ReactiveFormsModule,
      //CustomFormsModule,

      // VgCoreModule,
      // VgControlsModule,
      // VgOverlayPlayModule,
      // VgBufferingModule
      //NgUploaderModule
  ],
  declarations: [
      AppComponent,
      ExponentialStrengthPipe,
      AllWeekChartsComponent,
      WeekTypeChartsComponent,
      HomeComponent,
      NotFoundComponent,
      LoginComponent,
      RegisterComponent,
      VideoComponent,
      SongComponent
  ],
  providers: [
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
