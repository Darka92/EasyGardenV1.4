import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { IntranetRoutingModule } from './intranet-routing.module';
import { AccueilComponent } from './accueil/accueil.component';
import { NavComponent } from './nav/nav.component';
import { FooterComponent } from './footer/footer.component';
import { ArrosageComponent } from './arrosage/arrosage.component';
import { BassinComponent } from './bassin/bassin.component';
import { TondeuseComponent } from './tondeuse/tondeuse.component';
import { PortailComponent } from './portail/portail.component';
import { ImgaccComponent } from './imgacc/imgacc.component';
import { EclairageComponent } from './eclairage/eclairage.component';
import { ProfilComponent } from './profil/profil.component';
import { EquipementComponent } from './equipement/equipement.component';
import { NgxPaginationModule } from "ngx-pagination";


@NgModule({
  declarations: [AccueilComponent, NavComponent, FooterComponent, ArrosageComponent, BassinComponent, TondeuseComponent, PortailComponent,
    ImgaccComponent, EclairageComponent, ProfilComponent, EquipementComponent],
  imports: [
    CommonModule,
    IntranetRoutingModule,
    NgxPaginationModule
  ]
})
export class IntranetModule { }
