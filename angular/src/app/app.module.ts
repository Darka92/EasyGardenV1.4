import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { RouterModule } from '@angular/router';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';

import { NgxPaginationModule } from 'ngx-pagination';

import { FormsModule } from '@angular/forms';
import { Erreur404Component } from './erreur404/erreur404.component';
import { ConnexionComponent } from './connexion/connexion.component';
import { HttpClientModule } from '@angular/common/http';
import { ArrosageService } from './services/arrosage.service';
import { EclairageService } from './services/eclairage.service';
import { BassinService } from './services/bassin.service';
import { TondeuseService } from './services/tondeuse.service';
import { PortailService } from './services/portail.service';
import { InscriptionComponent } from './inscription/inscription.component';
import { FpasswordComponent } from './fpassword/fpassword.component';


@NgModule({
  declarations: [
    AppComponent,
    Erreur404Component,
    ConnexionComponent,
    InscriptionComponent,
    FpasswordComponent
  ],
  imports: [
    BrowserModule,
    RouterModule,
    AppRoutingModule,
    FormsModule,
    HttpClientModule,
    NgxPaginationModule
  ],
  providers: [
    ArrosageService,
    EclairageService,
    BassinService,
    TondeuseService,
    PortailService
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
