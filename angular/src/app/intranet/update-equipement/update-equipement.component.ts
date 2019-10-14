import { Component, OnInit } from '@angular/core';


/*  MES IMPORTS  */

/*  ROUTES  */
import { ActivatedRoute, Router } from '@angular/router';
import { Location } from '@angular/common';  /*  Nécessaire pour la fonction goBack()  */

/*  SERVICES  */
import { ArrosagesService } from 'src/app/services/arrosages.service';



@Component({
  selector: 'app-update-equipement',
  templateUrl: './update-equipement.component.html',
  styleUrls: ['./update-equipement.component.css']
})



export class UpdateEquipementComponent implements OnInit {

  arrosages = {};

  constructor(private arrosagesServices: ArrosagesService, private router: Router, private location: Location, private route: ActivatedRoute) {}

  id: number;

  ngOnInit() {
    this.id =+ this.route.snapshot.params['id'];
    this.arrosages = this.arrosagesServices.getArrosage(this.id);
    /*console.log(this.arrosages);*/
  }
  
  goBack() {
    this.location.back();
  }


}
