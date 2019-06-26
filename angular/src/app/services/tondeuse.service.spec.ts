import { TestBed } from '@angular/core/testing';

import { TondeuseService } from './tondeuse.service';

describe('TondeuseService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: TondeuseService = TestBed.get(TondeuseService);
    expect(service).toBeTruthy();
  });
});
