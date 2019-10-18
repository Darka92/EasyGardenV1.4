import { Component, OnInit, OnDestroy } from '@angular/core';


/*  MES IMPORTS */

/*  ANGULAR  */
import { Router } from '@angular/router';

/*  SERVICES  */
import { PortailsService } from 'src/app/services/portails.service';



@Component({
  selector: 'app-portail',
  templateUrl: './portail.component.html',
  styleUrls: ['./portail.component.css']
})



export class PortailComponent implements OnInit, OnDestroy {

  portails = [];

  constructor(private portailService: PortailsService, private router:Router) {}

  index: number;

  ngOnInit() {
    // Appeler méthode de service
    this.portails = this.portailService.portails;
    /*console.log(this.portails);*/
  }

  ngOnDestroy() {
  }

  getColor(statut: boolean) {
    if (statut === true) {
      return 'green';
    } else if (statut === false) {
      return 'red';
    }
  }

  onSwitch(i: number, statut: boolean) {
    if (statut === true) {
      this.portailService.switchOffOne(i);
    } else if (statut === false) {
      this.portailService.switchOnOne(i);
    }
  }

  
}