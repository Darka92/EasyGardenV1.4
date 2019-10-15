import { TestBed } from '@angular/core/testing';

import { PortailsService } from './portails.service';

describe('PortailsService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: PortailsService = TestBed.get(PortailsService);
    expect(service).toBeTruthy();
  });
});
