import { TestBed } from '@angular/core/testing';

import { BassinsService } from './bassins.service';

describe('BassinsService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: BassinsService = TestBed.get(BassinsService);
    expect(service).toBeTruthy();
  });
});
