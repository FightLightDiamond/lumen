import { NgModule }      from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
/**
 * Component
 */
import { AppComponent }  from './app.component';
import { u10Component } from  './components/u10.component';
import { u11Component } from  './components/u11.component';
import { u14Component } from  './components/u14.component';
import { u15Component } from  './components/u15.component';
import { EmployeeListComponent } from './components/employee.component';
import { HomeComponent } from './components/home.component';
import { NotFoundComponent } from './components/notfound.component';

/**
 * End Compnent
 */
import { ExponentialStrengthPipe } from  './pipes/exponential-strength.pipe';
import { FormsModule } from '@angular/forms';
import { HttpModule } from '@angular/http';
/**
 * Service
 */
import { EmployeeService } from  './services/employee.service'
/**
 * Routing
 */
import { appRoutes } from './routes/app.route';

@NgModule({
  imports:      [
      BrowserModule,
      FormsModule,
      HttpModule,
      appRoutes
  ],
  declarations: [
      AppComponent,
      u10Component,
      u11Component,
      u14Component,
      u15Component,
      ExponentialStrengthPipe,
      EmployeeListComponent,
      HomeComponent,
      NotFoundComponent
  ],
  providers: [ EmployeeService ],
  bootstrap:    [ AppComponent ]
})
export class AppModule { }
