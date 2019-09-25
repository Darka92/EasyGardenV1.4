import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { AccueilComponent } from './accueil/accueil.component';
import { ArrosageComponent } from './arrosage/arrosage.component';
import { EclairageComponent } from './eclairage/eclairage.component';
import { BassinComponent } from './bassin/bassin.component';
import { TondeuseComponent } from './tondeuse/tondeuse.component';
import { PortailComponent } from './portail/portail.component';
import { ImgaccComponent } from './imgacc/imgacc.component';
import { ProfilComponent } from './profil/profil.component';
import { EquipementComponent } from './equipement/equipement.component';
import { UpdateEquipementComponent } from './update-equipement/update-equipement.component';


const routes: Routes = [
  /*{ path: '', component: AccueilComponent },*/
  { path: 'easy-garden', component: AccueilComponent,
    children:[
      { path:'', component: ImgaccComponent},
      { path:'arrosage', component: ArrosageComponent},
      { path:'eclairage', component: EclairageComponent},
      { path:'bassin', component: BassinComponent},
      { path:'tondeuse', component: TondeuseComponent},
      { path:'portail', component: PortailComponent},
      { path:'profil', component: ProfilComponent},
      { path:'arrosage/equipement', component: EquipementComponent},
      { path:'arrosage/modifierequipement', component: UpdateEquipementComponent},
      { path:'eclairage/equipement', component: EquipementComponent},
      { path:'eclairage/modifierequipement', component: UpdateEquipementComponent},
      { path:'bassin/equipement', component: EquipementComponent},
      { path:'bassin/modifierequipement', component: UpdateEquipementComponent},
      { path:'tondeuse/equipement', component: EquipementComponent},
      { path:'tondeuse/modifierequipement', component: UpdateEquipementComponent},
      { path:'portail/equipement', component: EquipementComponent},
      { path:'portail/modifierequipement', component: UpdateEquipementComponent}
    ]}
];


@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})

export class IntranetRoutingModule { }
