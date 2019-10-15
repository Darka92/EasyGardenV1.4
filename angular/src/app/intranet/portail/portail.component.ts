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
    console.log(this.portails);
  }

  ngOnDestroy() {
  }

  getColor(statut) {
    if (statut === '1') {
      return 'green';
    } else if (statut === '0') {
      return 'red';
    }
  }

  onSwitch(i, statut) {
    if (statut === '1') {
      this.portailService.switchOffOne(i);
    } else if (statut === '0') {
      this.portailService.switchOnOne(i);
    }
  }

  
}
